import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});

// Public channel (optional if you’re only using private)
window.Echo.channel('chat-channel')
    .listen('.message.sent', (e) => {
        console.log('Received message:', e.message);

        const newMessageHTML = `
            <div class="mb-4">
                <strong>${e.message.user.fname} ${e.message.user.lname}:</strong>
                <span>${e.message.message}</span><br>
                <small class="text-gray-500">just now</small>
            </div>
            <hr>
        `;

        const container = document.getElementById('messages-container');
        if (container) {
            container.insertAdjacentHTML('beforeend', newMessageHTML);
            container.scrollTop = container.scrollHeight;
        }
    });

// Private message listener
const currentUserId = Number(document.querySelector('meta[name="user-id"]')?.content);
const recipientId = Number(document.querySelector('meta[name="recipient-id"]')?.content);

if (currentUserId) {
    window.Echo.private(`chat.user.${currentUserId}`)
        .listen('.private-message', (e) => {
            console.log('Received real-time message:', e);
            
            // Only show message if we're in the correct chat
            if (!(e.sender.id === recipientId || e.sender.id === currentUserId)) return;

            const container = document.getElementById('private-messages-container');
            if (!container) return;

            // Create message bubble HTML matching your design
            const isOwnMessage = e.sender.id === currentUserId;
            const messageHTML = createMessageBubble(e.message, e.sender, isOwnMessage);

            // Add message to container
            container.insertAdjacentHTML('beforeend', messageHTML);
            
            // Scroll to bottom
            container.scrollTop = container.scrollHeight;
        });
}

function createMessageBubble(message, sender, isOwnMessage) {
    const timeAgo = 'just now';
    const avatarHTML = sender.profile_pic
        ? `<img src="${sender.profile_pic}" class="w-8 h-8 rounded-full object-cover">`
        : `<div class="w-8 h-8 bg-[#B59F84] text-white rounded-full flex items-center justify-center text-xs font-semibold">
              ${sender.fname.charAt(0)}${sender.lname.charAt(0)}
           </div>`;

    const bubbleClasses = isOwnMessage
        ? 'bg-gradient-to-r from-[#634600] to-[#B59F84] text-white rounded-2xl rounded-br-md'
        : 'bg-white text-[#634600] rounded-2xl rounded-bl-md shadow-sm border border-[#B59F84]';

    const safeMessage = message.message
        ? message.message.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br>")
        : '';

    const imageHTML = message.image_url 
        ? `<div class="mb-2"><img src="${message.image_url}" class="max-w-xs rounded-lg shadow-sm"></div>`
        : '';

    return `
        <div class="flex ${isOwnMessage ? 'justify-end' : 'justify-start'} mb-2 message-item">
            <div class="flex max-w-[85%] sm:max-w-xs lg:max-w-md ${isOwnMessage ? 'flex-row-reverse' : 'flex-row'} items-end space-x-2">
                <div class="w-8 h-8 rounded-full flex-shrink-0 ${isOwnMessage ? 'ml-1' : 'mr-1'}">${avatarHTML}</div>
                <div class="flex flex-col ${isOwnMessage ? 'items-end' : 'items-start'}">
                    <div class="px-4 py-2 text-sm break-words ${bubbleClasses}">
                        ${imageHTML}
                        ${safeMessage}
                    </div>
                    <div class="mt-1 ${isOwnMessage ? 'text-right' : 'text-left'}">
                        <span class="text-xs text-gray-500">${timeAgo}</span>
                    </div>
                </div>
            </div>
        </div>
    `;
}


// Notification listener
const authUserId = Number(document.querySelector('meta[name="user-id"]')?.content);

if (authUserId) {
    window.Echo.private(`notifications-channel.${authUserId}`)
        .listen('.comment.notification', (e) => {
            console.log("🔔 New Comment Notification:", e);

            // Toast popup
            showNotificationToast(`${e.from_user} commented: "${e.content}"`);

            // Dispatch event for Alpine
            window.dispatchEvent(new CustomEvent('new-notification', {
                detail: {
                    id: Date.now(),
                    data: {
                        from_user: e.from_user,
                        content: e.content,
                        product_id: e.product_id,
                    },
                    created_at: new Date().toISOString(),
                    is_read: false,
                }
            }));
        });
}

// Product Status Notification listener
if (authUserId) {
    window.Echo.private(`notifications-channel.${authUserId}`)
        .listen('.product.status.notification', (e) => {
            console.log("🔔 Product Status Notification:", e);

            // Show friendly toast based on status
            showNotificationToast(e.message); // e.message already contains "approved" or "rejected" text

            // Dispatch event for Alpine or any frontend updates
            window.dispatchEvent(new CustomEvent('new-notification', {
                detail: {
                    id: Date.now(),
                    data: {
                        product_id: e.id,
                        product_name: e.name,
                        status: e.status,
                        message: e.message,
                        from_user: e.from_user,
                    },
                    created_at: new Date().toISOString(),
                    is_read: false,
                }
            }));
        });
}

// Order Placed Notification listener
if (authUserId) {
    window.Echo.private(`notifications-channel.${authUserId}`)
        .listen('.order.placed.notification', (e) => {
            console.log("🛒 New Order Notification:", e);

            // Show a nice toast message
            showNotificationToast(`🛍️ New Order: ${e.buyer_name} placed an order for ${e.product_name}`);

            // Dispatch event for Alpine/Live updates
            window.dispatchEvent(new CustomEvent('new-notification', {
                detail: {
                    id: Date.now(),
                    data: {
                        order_id: e.id,
                        product_name: e.product_name,
                        buyer_name: e.buyer_name,
                        message: e.message,
                    },
                    created_at: new Date().toISOString(),
                    is_read: false,
                }
            }));
        });
}


// Function to show toast notification
function showNotificationToast(message) {
    const toast = document.createElement("div");
    toast.className = "fixed bottom-4 right-4 bg-[#B59F84] text-white px-4 py-2 rounded-lg shadow-lg z-50";
    toast.innerText = message;

    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 4000);
}


