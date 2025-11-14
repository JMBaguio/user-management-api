<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $donation->name }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto p-6">
            <!-- Two-Column Layout -->
            <div class="flex flex-col lg:flex-row gap-8 items-stretch">
                <!-- Left Column: Image Slider & donation Info -->
                <div class="lg:w-1/3 flex flex-col gap-6 h-full">
                    <!-- Swiper Slider -->
                    <div class="relative swiper mySwiper rounded-xl overflow-hidden shadow-lg h-[28rem] sm:h-[32rem]">
                        <div class="swiper-wrapper h-full">
                            @if ($donation->donationImages && $donation->donationImages->count() > 0)
                                @foreach ($donation->donationImages as $image)
                                    <div class="swiper-slide flex items-center justify-center bg-white h-full">
                                        <img src="{{ Storage::disk('s3')->url($image->image) }}"
                                            alt="{{ $image->name }}"
                                            class="w-full h-full object-cover transition-transform duration-500 ease-out hover:scale-105">
                                    </div>
                                @endforeach
                            @else
                                <!-- Fallback placeholder if no images -->
                                <div class="swiper-slide flex items-center justify-center bg-white h-full">
                                    <img src="{{ asset('images/default-placeholder.png') }}" alt="No image"
                                        class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div
                                class="absolute top-2 left-2 z-10 dark:bg-green-300 bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full shadow">
                                Free
                            </div>
                        </div>

                        <!-- Swiper Pagination (overlay) -->
                        <div class="swiper-pagination absolute bottom-4 left-1/2 transform -translate-x-1/2 z-10"></div>
                        <!-- Swiper Navigation -->
                        <div
                            class="swiper-button-next !text-white text-3xl z-20 hover:!text-gray-200 transition-colors duration-300">
                        </div>
                        <div
                            class="swiper-button-prev !text-white text-3xl z-20 hover:!text-gray-200 transition-colors duration-300">
                        </div>
                    </div>
                    <!-- donation Info Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ $donation->name }}
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Size: {{ $donation->size }} ·
                            {{ ucfirst($donation->condition) }} condition ·
                            {{ $donation->category->name ?? 'No Category' }}
                        </p>
                        <div class="space-y-4 mt-4">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Details</h2>
                            <p class="text-gray-600 dark:text-gray-400">{{ $donation->status }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ $donation->description }}</p>
                        </div>

                        <div class="mt-4 flex flex-col gap-3">
                            <p class="text-lg font-bold text-[#B59F84]">Free</p>
                            <p class="text-sm text-gray-500">Quantity: {{ $donation->qty }}</p>
                            <p class="text-sm text-gray-500">Status: {{ ucfirst($donation->status) }}</p>

                            @if (Auth::id() === $donation->user_id)
                                <div class="flex flex-col gap-3 mt-4">
                                    <a href="{{ route('donations.edit', $donation->id) }}"
                                        class="px-6 py-3 bg-[#B59F84] text-white rounded-lg hover:bg-[#a08e77] transition-all duration-300 text-center font-medium">
                                        Update Donation
                                    </a>

                                    @if ($donation->status === 'available' && $donation->approval_status === 'approved' && !$donation->proof)
                                        <!-- Trigger Modal Instead of Direct Form Submit -->
                                        <button type="button" onclick="openProofModal({{ $donation->id }})"
                                            class="w-full px-6 py-3 bg-green-100 text-green-600 rounded-lg hover:bg-green-200 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800 transition-all duration-300 font-medium">
                                            Mark as Donated
                                        </button>
                                    @endif
                                </div>
                            @endif

                            <!-- Modal (Include Once Per Page) -->
                            <div id="proofModal"
                                class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
                                <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-xl relative">
                                    <!-- Close Button -->
                                    <button onclick="closeProofModal()"
                                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl">
                                        &times;
                                    </button>

                                    <!-- Modal Header -->
                                    <h2 class="text-xl font-semibold mb-4 text-center text-gray-800">
                                        Upload Donation Proof
                                    </h2>

                                    <!-- Proof Upload Form -->
                                    <form id="proofForm" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-4">
                                            <label for="proof" class="block text-gray-700 font-medium mb-2">
                                                Upload Proof Image
                                            </label>
                                            <input type="file" name="proof" id="proof" accept="image/*"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#B59F84] focus:outline-none"
                                                required>
                                        </div>

                                        <div class="flex justify-end mt-5">
                                            <button type="button" onclick="closeProofModal()"
                                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg mr-2">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                class="bg-[#B59F84] hover:bg-[#a08e77] text-white px-4 py-2 rounded-lg">
                                                Submit Proof
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="lg:w-2/3 flex flex-col gap-8">
                    <!-- User Profile Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                        <!-- Background Image Section -->
                        <div class="relative h-36 bg-center bg-cover"
                            style="background-image: url('{{ asset('images/Rectangle 99.png') }}');">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/30"></div>
                        </div>

                        <!-- User Info Section -->
                        <div class="relative bg-[#E1D5B6] dark:bg-gray-800 p-6">
                            <!-- Avatar -->
                            <div
                                class="absolute -top-10 left-6 w-20 h-20 rounded-full border-4 border-white dark:border-gray-800 overflow-hidden shadow-md">
                                @if ($donation->user->profile_pic)
                                    <img src="{{ Storage::disk('s3')->url($donation->user->profile_pic) }}"
                                        alt="Profile Picture" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile Picture"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>

                            <!-- User Details -->
                            <div class="flex items-start justify-between pt-10">
                                <div class="flex-1">
                                    <div class="donation-card">
                                        <x-user-name-badge :user="$donation->user" />
                                    </div>
                                    <!-- Rating -->
                                    <div class="flex items-center mt-2">
                                        <div class="flex text-yellow-400">
                                            <span>★★★★★</span>
                                        </div>
                                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">(5)</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-col gap-3 ml-4">
                                    @if (Auth::check() && Auth::id() !== $donation->user->id)
                                        <a href="{{ route('private.chat', $donation->user->id) }}"
                                            class="px-5 py-2.5 bg-white dark:bg-gray-700 text-[#B59F84] dark:text-[#E1D5B6] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                                            Message
                                        </a>
                                    @endif
                                    <a href="{{ route('profile.show', $donation->user->id) }}"
                                        class="px-5 py-2.5 bg-white dark:bg-gray-700 text-[#B59F84] dark:text-[#E1D5B6] rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-all duration-300 text-sm font-medium">
                                        Visit Profile
                                    </a>
                                </div>
                            </div>

                            <!-- Report Button (if not the owner) -->
                            @if (Auth::id() !== $donation->user_id)
                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a href="{{ route('reports.create', $donation->user->id) }}"
                                        class="inline-flex items-center gap-2 px-3 py-2 text-sm text-red-500 dark:text-red-400 hover:text-red-600 dark:hover:text-red-300 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 9v2m0 4h.01M5.455 4.455a2.836 2.836 0 012-1.455h9.09a2.836 2.836 0 012 1.455l3.182 5.455a2.836 2.836 0 010 2.182L18.545 17.09a2.836 2.836 0 01-2 1.455H7.455a2.836 2.836 0 01-2-1.455L2.273 12.09a2.836 2.836 0 010-2.182L5.455 4.455z" />
                                        </svg>
                                        Report User
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Google Maps Location Section -->
                    <div class="mt-1 bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md">
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#B59F84]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Location</h3>
                        </div>

                        <!-- Location Details -->
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <span class="font-medium">Address:</span>
                                {{ $donation->barangay->name ?? 'N/A' }}, Cebu City, Cebu 6000
                            </p>
                        </div>

                        <!-- Alternative approach -->
                        <div class="rounded-lg overflow-hidden shadow-lg border border-gray-200 dark:border-gray-700">
                            <div id="google-map-container"
                                class="w-full h-64 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                @if ($donation->barangay && $donation->barangay->name)
                                    <!-- Alternative URL format that should show the pin -->
                                    <iframe id="location-map" width="100%" height="100%" style="border:0;"
                                        loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                                        src="https://maps.google.com/maps?q={{ urlencode($donation->barangay->name . ', Cebu City, Cebu, Philippines') }}&z=15&output=embed">
                                    </iframe>
                                @else
                                    <!-- Fallback content -->
                                    <div class="text-center text-gray-500 dark:text-gray-400 p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-12 w-12 mx-auto mb-2 opacity-50" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 11111.314 0z" />
                                        </svg>
                                        <p class="text-sm">Location information not available</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Map Actions -->
                        <div class="mt-4 flex gap-3">
                            @if ($donation->barangay && $donation->barangay->name)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($donation->barangay->name . ', Cebu City, Cebu, Philippines') }}"
                                    target="_blank"
                                    class="flex-1 bg-[#B59F84] text-white text-center py-2.5 rounded-lg hover:bg-[#a08e77] transition-all duration-300 font-medium text-sm">
                                    Open in Google Maps
                                </a>
                                {{-- <button onclick="copyLocation()"
                                    class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 font-medium text-sm">
                                    Copy Address
                                </button> --}}
                            @endif
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="bg-[#F4F2ED] dark:bg-gray-800 rounded-xl p-10 shadow-md">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Comments</h3>

                        <!-- Scrollable Comment List -->
                        <div id="comments-container" class="space-y-4 max-h-80 overflow-y-auto pr-2">
                            @forelse($donation->comments as $comment)
                                <!-- Comment Item -->
                                <div class="comment-item bg-white dark:bg-gray-700 rounded-lg p-4 shadow-sm"
                                    data-comment-id="{{ $comment->id }}" id="comment-{{ $comment->id }}">
                                    <div class="flex gap-3">
                                        <!-- User Avatar -->
                                        <div class="flex-shrink-0">
                                            <div
                                                class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 overflow-hidden bg-[#B59F84] flex items-center justify-center">
                                                @if ($comment->user->profile_pic)
                                                    <img src="{{ Storage::disk('s3')->url($comment->user->profile_pic) }}"
                                                        alt="{{ $comment->user->fname }}'s Profile Picture"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <img src="{{ asset('images/default-profile.jpg') }}"
                                                        alt="Default Profile Picture"
                                                        class="w-full h-full object-cover">
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Comment Content -->
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start mb-1">
                                                <div>
                                                    <a href="{{ route('profile.show', $comment->user->id) }}"
                                                        class="hover:underline">
                                                        <x-user-name-badge :user="$comment->user" />
                                                    </a>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <!-- Comment Options (for comment owner) -->
                                                @if (Auth::id() === $comment->user_id)
                                                    <div class="relative">
                                                        <button type="button"
                                                            class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-600"
                                                            onclick="toggleDropdown({{ $comment->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 text-gray-600 dark:text-gray-200"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path
                                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                                            </svg>
                                                        </button>
                                                        <div id="dropdown-{{ $comment->id }}"
                                                            class="absolute right-0 mt-1 w-28 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded shadow z-10 hidden">
                                                            <button type="button"
                                                                onclick="toggleEditForm({{ $comment->id }})"
                                                                class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                                                Edit
                                                            </button>
                                                            <button type="button"
                                                                onclick="deleteComment({{ $comment->id }})"
                                                                class="w-full text-left px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div id="comment-content-{{ $comment->id }}"
                                                class="text-gray-800 dark:text-gray-200 mb-2">
                                                {{ $comment->content }}
                                            </div>
                                            <div
                                                class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400">
                                                <button onclick="toggleLike({{ $comment->id }})"
                                                    class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200 {{ $comment->userLikes->count() > 0 ? 'text-[#B59F84]' : 'text-gray-500' }}"
                                                    id="like-btn-{{ $comment->id }}">
                                                    <svg class="w-4 h-4"
                                                        fill="{{ $comment->userLikes->count() > 0 ? 'currentColor' : 'none' }}"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        id="like-count-{{ $comment->id }}">{{ $comment->likes_count }}</span>
                                                </button>
                                                <button
                                                    onclick="startReply({{ $comment->id }}, '{{ addslashes($comment->user->fname . ' ' . $comment->user->lname) }}')"
                                                    class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                        </path>
                                                    </svg>
                                                    Reply
                                                </button>
                                                @if ($comment->replies && $comment->replies->count() > 0)
                                                    <button onclick="toggleReplies({{ $comment->id }})"
                                                        class="text-[#B59F84] hover:underline">
                                                        {{ $comment->replies->count() }}
                                                        {{ $comment->replies->count() == 1 ? 'reply' : 'replies' }}
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Form (Hidden by Default) -->
                                    @if (Auth::id() === $comment->user_id)
                                        <form id="inline-edit-form-{{ $comment->id }}"
                                            action="{{ route('comments.update', $comment->id) }}" method="POST"
                                            class="inline-edit-form hidden mt-2 bg-gray-100 dark:bg-gray-600 p-3 rounded-lg"
                                            data-id="{{ $comment->id }}">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="content" rows="2"
                                                class="w-full border rounded p-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200">{{ old('content', $comment->content) }}</textarea>
                                            <div class="flex gap-2 mt-2">
                                                <button type="submit"
                                                    class="px-3 py-1 bg-[#B59F84] text-white rounded text-sm hover:bg-[#a08e77] transition-all duration-200">Save</button>
                                                <button type="button" onclick="cancelEdit({{ $comment->id }})"
                                                    class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 text-sm">Cancel</button>
                                            </div>
                                        </form>
                                    @endif

                                    <!-- Replies Container - All replies in one vertical thread -->
                                    <div id="replies-{{ $comment->id }}"
                                        class="hidden ml-4 mt-3 space-y-3 border-l-2 border-gray-200 dark:border-gray-600 pl-4">
                                        @foreach ($comment->replies as $reply)
                                            <div class="reply-item flex gap-3" data-comment-id="{{ $reply->id }}"
                                                id="reply-{{ $reply->id }}"
                                                data-parent-id="{{ $reply->parent_id }}">

                                                <!-- Avatar -->
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="w-8 h-8 bg-[#B59F84] rounded-full border-2 border-white dark:border-gray-800 overflow-hidden flex items-center justify-center">
                                                        @if ($reply->user->profile_pic)
                                                            <img src="{{ asset('storage/' . $reply->user->profile_pic) }}"
                                                                alt="{{ $reply->user->fname }}'s Profile Picture"
                                                                class="w-full h-full object-cover">
                                                        @else
                                                            <img src="{{ asset('images/default-profile.jpg') }}"
                                                                alt="Default Profile Picture"
                                                                class="w-full h-full object-cover">
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Reply Content -->
                                                <div class="flex-1">
                                                    <div>
                                                        <a href="{{ route('profile.show', $reply->user->id) }}"
                                                            class="hover:underline">
                                                            <x-user-name-badge :user="$reply->user" />
                                                        </a>
                                                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </span>
                                                    </div>

                                                    <p class="text-sm text-gray-800 dark:text-gray-200">
                                                        {{ $reply->content }}</p>

                                                    <!-- Actions -->
                                                    <div
                                                        class="mt-2 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                                                        <button onclick="toggleLike({{ $reply->id }})"
                                                            class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200 {{ $reply->userLikes->count() > 0 ? 'text-[#B59F84]' : 'text-gray-500' }}"
                                                            id="like-btn-{{ $reply->id }}">
                                                            <svg class="w-3 h-3"
                                                                fill="{{ $reply->userLikes->count() > 0 ? 'currentColor' : 'none' }}"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                                </path>
                                                            </svg>
                                                            <span
                                                                id="like-count-{{ $reply->id }}">{{ $reply->likes_count }}</span>
                                                        </button>

                                                        <!-- Reply button -->
                                                        <button
                                                            onclick="startReply({{ $reply->id }}, '{{ addslashes($reply->user->fname . ' ' . $reply->user->lname) }}')"
                                                            class="hover:text-[#B59F84] transition-colors duration-200">
                                                            Reply
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-600 dark:text-gray-400 text-sm py-4 text-center">No comments yet.
                                    Be the first to comment!</p>
                            @endforelse
                        </div>

                        <!-- Comment Form -->
                        @auth
                            <form id="comment-form" action="{{ route('comments.store') }}" method="POST"
                                class="mt-6">
                                @csrf
                                <input type="hidden" name="donation_id" value="{{ $donation->id }}">
                                <input type="hidden" name="parent_id" id="parent_id" value="">
                                <div
                                    class="relative flex flex-col md:flex-row items-stretch md:items-center gap-3 w-full max-w-xl bg-white dark:bg-gray-800 p-3 rounded-2xl border border-gray-200 dark:border-gray-600 shadow-md">
                                    <div class="relative w-full flex items-center">
                                        <textarea name="content" id="comment-content" placeholder="Write a comment..."
                                            class="mentionable flex-1 w-full resize-none overflow-hidden rounded-lg px-4 py-2 text-sm text-gray-800 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#B59F84] border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 pr-10"
                                            rows="2" oninput="this.style.height='auto';this.style.height=this.scrollHeight+'px'; handleCommentInput()"
                                            required></textarea>
                                        <button type="submit"
                                            class="absolute right-2 bottom-2 bg-[#B59F84] text-white font-semibold px-3 py-2 rounded-lg shadow hover:bg-[#a08e77] transition-all duration-300 ease-in-out md:static md:ml-3 md:bottom-auto md:right-auto md:w-auto">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                    <button type="button" id="reply-cancel-btn" onclick="cancelReply()"
                                        class="hidden ml-2 text-[#B59F84] hover:underline">Cancel</button>

                                </div>

                                <div id="comment-error" class="text-red-500 mt-2 text-sm hidden"></div>

                                <!-- Reply indicator (hidden by default) -->
                                <div id="reply-indicator"
                                    class="hidden mt-2 text-sm text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <span id="replying-to" class="font-medium"></span>

                                </div>
                            </form>
                        @else
                            <p class="mt-3 text-gray-600 dark:text-gray-400">
                                <a href="{{ route('login') }}" class="text-[#B59F84] hover:underline">Login</a> to
                                comment.
                            </p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- More Donations from the Same User -->
    @if ($moreDonations->count())
        <div class="py-6 bg-white dark:bg-gray-900 mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                        More from {{ $donation->user->fname }}
                    </h2>
                </div>
                <div class="rounded-xl shadow-sm overflow-hidden">
                    <div class="p-4 sm:p-6">
                        <div
                            class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-4 md:gap-6">
                            @foreach ($moreDonations as $donationItem)
                                <div
                                    class="group relative bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-200 border border-[#D9D9D9] dark:border-gray-700">
                                    <a href="{{ route('donations.show', $donationItem->id) }}" class="block h-full">
                                        <div
                                            class="absolute top-1 left-1 z-10 bg-[#D9D9D9] text-gray-700 text-[10px] sm:text-xs px-1.5 py-0.5 sm:px-2 sm:py-1 rounded-full">
                                            Donation
                                        </div>
                                        <div class="relative aspect-square overflow-hidden">
                                            <img src="{{ Storage::disk('s3')->url($image->image) }}"
                                                alt="{{ $donationItem->name }}" class="w-full h-full object-cover">
                                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                                            <div
                                                class="absolute inset-0 bg-gray-800 bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                <span
                                                    class="bg-white text-gray-800 px-2 py-0.5 rounded-full text-[10px] sm:text-xs font-medium">
                                                    Quick view
                                                </span>
                                            </div>
                                        </div>

                                        <div class="p-2 sm:p-3">
                                            <div class="flex justify-between items-start">
                                                <h3
                                                    class="text-xs sm:text-sm font-bold text-gray-900 dark:text-white transition-colors truncate max-w-[70%]">
                                                    {{ $donationItem->name }}
                                                </h3>
                                                <span
                                                    class="text-[10px] sm:text-xs font-medium px-1 py-0.5 bg-[#D9D9D9] dark:bg-gray-700 rounded text-gray-700 dark:text-gray-300">
                                                    {{ $donationItem->size ?? 'L' }}
                                                </span>
                                            </div>

                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-[10px] sm:text-xs mt-0.5 truncate">
                                                {{ $donationItem->category->name ?? 'No Category' }}
                                            </p>
                                            <p
                                                class="text-gray-500 dark:text-gray-400 text-[10px] sm:text-xs mt-0.5 truncate">
                                                <i>{{ $donationItem->barangay->name ?? 'N/A' }}, Cebu City</i>
                                            </p>

                                            <div class="flex justify-between items-center mt-1">
                                                <p class="text-xs sm:text-sm font-bold text-gray-700">
                                                    For Donation
                                                </p>

                                                <button
                                                    class="favorite-btn text-gray-400 hover:text-red-500 focus:outline-none transition-colors"
                                                    data-id="{{ $donationItem->id }}" type="button"
                                                    onclick="event.preventDefault(); event.stopPropagation();">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 sm:h-5 sm:w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-6 bg-white dark:bg-gray-900 mt-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center p-6 border border-dashed border-gray-300 dark:border-gray-700 rounded-xl">
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        No other donations from <strong>{{ $donation->user->fname }}</strong> yet.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Back Link -->
    <div class="flex flex-col overflow-hidden ml-[60px]">
        <a href="{{ route('donations.index') }}" class="flex items-center gap-2 text-[#B59F84] hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7 7-7M3 12h18" />
            </svg>
            <span>Back to donations</span>
        </a>
    </div>

    <script>
        // Global variables to track reply state
        let currentReplyParentId = null;
        let currentReplyUsername = null;

        // Handle comment input to show/hide cancel button
        function handleCommentInput() {
            const textarea = document.getElementById('comment-content');
            const cancelBtn = document.getElementById('reply-cancel-btn');

            if (textarea && cancelBtn) {
                if (textarea.value.trim().length > 0) {
                    cancelBtn.classList.remove('hidden');
                } else {
                    cancelBtn.classList.add('hidden');
                }
            }
        }

        // Function to start a reply (Instagram-style)
        function startReply(commentId, displayName) {
            // Set the current reply state
            currentReplyParentId = commentId;
            currentReplyUsername = displayName;

            // Update the main comment form
            const commentTextarea = document.getElementById('comment-content');
            const parentIdField = document.getElementById('parent_id');
            const replyIndicator = document.getElementById('reply-indicator');
            const replyingToSpan = document.getElementById('replying-to');

            // Set the parent_id
            parentIdField.value = commentId;

            // Update textarea with @username
            if (displayName) {
                const prefix = `@${displayName} `;
                commentTextarea.value = prefix;
                commentTextarea.setSelectionRange(prefix.length, prefix.length);
            }

            // Show reply indicator
            replyingToSpan.textContent = `Replying to ${displayName}`;
            replyIndicator.classList.remove('hidden');

            // Show cancel button since we have content (the @username)
            handleCommentInput();

            // Focus on the textarea
            commentTextarea.focus();

            // Scroll to the comment form
            commentTextarea.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            // Ensure the parent's replies container is visible
            const parentRepliesContainer = document.getElementById(`replies-${commentId}`);
            if (parentRepliesContainer) {
                parentRepliesContainer.classList.remove('hidden');
            }
        }

        // Function to cancel reply
        function cancelReply() {
            currentReplyParentId = null;
            currentReplyUsername = null;

            const commentTextarea = document.getElementById('comment-content');
            const parentIdField = document.getElementById('parent_id');
            const replyIndicator = document.getElementById('reply-indicator');
            const cancelBtn = document.getElementById('reply-cancel-btn');

            // Clear values
            commentTextarea.value = '';
            parentIdField.value = '';

            // Hide reply indicator
            replyIndicator.classList.add('hidden');

            // Hide cancel button
            if (cancelBtn) {
                cancelBtn.classList.add('hidden');
            }

            // Reset textarea height
            commentTextarea.style.height = 'auto';

            // Focus on textarea
            commentTextarea.focus();
        }


        // JavaScript to expand comments on hover
        document.querySelectorAll('.comment-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const lineClamp = this.querySelector('.line-clamp-3');
                if (lineClamp) {
                    lineClamp.style['-webkit-line-clamp'] = 'unset';
                    lineClamp.style.display = 'block';
                }
            });

            item.addEventListener('mouseleave', function() {
                const lineClamp = this.querySelector('.line-clamp-3');
                if (lineClamp) {
                    lineClamp.style['-webkit-line-clamp'] = '3';
                    lineClamp.style.display = '-webkit-box';
                }
            });
        });
        // Rest of your existing JavaScript functions remain the same...
        function toggleDropdown(commentId) {
            const dropdown = document.getElementById('dropdown-' + commentId);
            if (dropdown.classList.contains('hidden')) {
                // Close all other dropdowns first
                document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                    el.classList.add('hidden');
                });
                // Open this dropdown
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[onclick^="toggleDropdown"]') && !event.target.closest(
                    '[id^="dropdown-"]')) {
                document.querySelectorAll('[id^="dropdown-"]').forEach(el => {
                    el.classList.add('hidden');
                });
            }
        });

        function toggleEditForm(commentId) {
            const contentDiv = document.getElementById(`comment-content-${commentId}`);
            const form = document.getElementById(`inline-edit-form-${commentId}`);
            const dropdown = document.getElementById(`dropdown-${commentId}`);

            if (dropdown) dropdown.classList.add('hidden'); // hide dropdown when editing
            contentDiv.classList.toggle('hidden');
            form.classList.toggle('hidden');
        }

        function cancelEdit(commentId) {
            const contentDiv = document.getElementById(`comment-content-${commentId}`);
            const form = document.getElementById(`inline-edit-form-${commentId}`);

            contentDiv.classList.remove('hidden');
            form.classList.add('hidden');
        }

        function deleteComment(commentId) {
            console.log('Attempting to delete comment with ID:', commentId);

            // Debug: List all comments and their IDs
            const allComments = document.querySelectorAll('.comment-item');
            console.log('All comments in DOM:');
            allComments.forEach((comment, index) => {
                console.log(`Comment ${index}:`, {
                    id: comment.id,
                    dataId: comment.getAttribute('data-comment-id'),
                    text: comment.textContent.substring(0, 50) + '...'
                });
            });

            fetch(`/comments/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Delete response:', data);
                    if (data.success) {
                        // Find the specific comment element - be more specific to avoid conflicts
                        const commentElement = document.getElementById(`comment-${commentId}`) || document
                            .querySelector(`.comment-item[data-comment-id="${commentId}"]`);
                        const replyElement = document.querySelector(`.reply-item[data-comment-id="${commentId}"]`);

                        console.log('Found comment element:', commentElement);
                        console.log('Found reply element:', replyElement);

                        const elementToRemove = commentElement || replyElement;

                        if (elementToRemove) {
                            console.log('Removing element:', elementToRemove);
                            // Remove the entire comment/reply element
                            elementToRemove.remove();

                            // Check if there are any remaining comments
                            const remainingComments = document.querySelectorAll('.comment-item');
                            console.log('Remaining comments:', remainingComments.length);
                            if (remainingComments.length === 0) {
                                // Show "no comments" message if no comments left
                                const container = document.getElementById('comments-container');
                                container.innerHTML =
                                    '<p class="text-gray-500 text-center py-4">No comments yet. Be the first to comment!</p>';
                            }
                        } else {
                            console.error('Comment element not found for ID:', commentId);
                            alert('Comment not found. Please refresh the page.');
                        }
                    } else {
                        alert('Failed to delete comment: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error deleting comment:', error);
                    alert('Something went wrong while deleting the comment.');
                });
        }

        window.addEventListener("pageshow", function(event) {
            if (event.persisted) {
                // Add cache-busting parameter and reload
                const url = new URL(window.location);
                url.searchParams.set('_t', Date.now());
                window.location.href = url.toString();
            }
        });

        // Force refresh on back/forward navigation
        window.addEventListener("popstate", function(event) {
            const url = new URL(window.location);
            url.searchParams.set('_t', Date.now());
            window.location.href = url.toString();
        });

        // Delegate inline edit form submissions so dynamically-added comments work without refresh
        document.addEventListener('submit', function(e) {
            if (e.target && e.target.classList.contains('inline-edit-form')) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);
                formData.append('_method', 'PUT');

                const commentId = form.dataset.id;
                const url = form.action;

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const contentDiv = document.getElementById('comment-content-' + commentId);
                            if (contentDiv) contentDiv.innerText = data.comment.content;
                            form.classList.add('hidden');
                            if (contentDiv) contentDiv.classList.remove('hidden');
                        } else {
                            alert(data.error || 'Failed to update comment.');
                        }
                    })
                    .catch(error => {
                        console.error('Error updating comment:', error);
                        alert('Something went wrong while updating the comment.');
                    });
            }
        });

        // AJAX comment submission
        document.addEventListener('DOMContentLoaded', function() {
            const commentForm = document.getElementById('comment-form');
            if (commentForm) {
                commentForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const errorDiv = document.getElementById('comment-error');
                    const submitButton = this.querySelector('button[type="submit"]');
                    const originalButtonText = submitButton.innerHTML;

                    // Show loading state
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    submitButton.disabled = true;
                    errorDiv.classList.add('hidden');

                    fetch("{{ route('comments.store') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: formData
                        })
                        .then(async (response) => {
                            const contentType = response.headers.get('content-type') || '';
                            if (!response.ok) {
                                if (contentType.includes('application/json')) {
                                    const errorData = await response.json();
                                    const msg = errorData.message || errorData.errors?.content?.[
                                        0
                                    ] || 'Error';
                                    throw new Error(msg);
                                } else {
                                    throw new Error('Request failed (maybe login required).');
                                }
                            }
                            if (!contentType.includes('application/json')) {
                                throw new Error('Unexpected response from server.');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                // Clear the textarea and reset form
                                document.getElementById('comment-content').value = '';
                                // Hide cancel button
                                handleCommentInput();
                                cancelReply(); // Reset reply state

                                // Add the new comment/reply to the list
                                if (data.comment.parent_id) {
                                    // This is a reply - add it to the appropriate container
                                    addReplyToDOM(data.comment);

                                    // Show the replies container if it's hidden
                                    const repliesContainer = document.getElementById(
                                        `replies-${data.comment.parent_id}`);
                                    if (repliesContainer && repliesContainer.classList.contains(
                                            'hidden')) {
                                        repliesContainer.classList.remove('hidden');
                                    }

                                    // Update replies count
                                    updateRepliesCount(data.comment.parent_id);
                                } else {
                                    // This is a top-level comment
                                    addCommentToDOM(data.comment);

                                    // If there was a "no comments" message, remove it
                                    const noCommentsMsg = document.querySelector(
                                        '#comments-container > p');
                                    if (noCommentsMsg) {
                                        noCommentsMsg.remove();
                                    }
                                }
                            } else {
                                throw new Error(data.message || 'An error occurred');
                            }
                        })
                        .catch(error => {
                            errorDiv.textContent = error.message ||
                                'Failed to post comment. Please try again.';
                            errorDiv.classList.remove('hidden');
                        })
                        .finally(() => {
                            submitButton.innerHTML = originalButtonText;
                            submitButton.disabled = false;
                        });
                });
            }
        });

        function addCommentToDOM(commentData) {
            // ✅ If this is a reply
            if (commentData.parent_id) {
                let repliesContainer = document.getElementById(`replies-${commentData.parent_id}`);

                // If no replies container yet, create one
                if (!repliesContainer) {
                    const parentComment = document.getElementById(`comment-${commentData.parent_id}`) || document
                        .getElementById(`reply-${commentData.parent_id}`);
                    if (parentComment) {
                        repliesContainer = document.createElement('div');
                        repliesContainer.id = `replies-${commentData.parent_id}`;
                        repliesContainer.className =
                            "ml-4 mt-3 space-y-3 border-l-2 border-gray-200 dark:border-gray-600 pl-4";
                        parentComment.appendChild(repliesContainer);
                    }
                }

                // prevent duplicate
                if (document.getElementById(`reply-${commentData.id}`)) {
                    return;
                }

                const replyHtml = `
                <div class="reply-item flex gap-3" id="reply-${commentData.id}">
                    <div class="w-8 h-8 bg-[#B59F84] rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-white">
                                        ${commentData.user.fname ? (commentData.user.fname.charAt(0) + commentData.user.lname.charAt(0)).toUpperCase() : 'U'}
                                    </span>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium">${commentData.user.fname} ${commentData.user.lname}</p>
                        <p>${commentData.content}</p>
                        <button onclick="startReply(${commentData.id}, '${commentData.user.fname} ${commentData.user.lname}')" class="text-xs text-gray-500 hover:text-[#B59F84]">Reply</button>
                    </div>
                </div>
            `;

                repliesContainer.insertAdjacentHTML('beforeend', replyHtml);
                return;
            }

            // ✅ Otherwise, this is a top-level comment
            const commentsContainer = document.getElementById('comments-container');

            if (document.getElementById(`comment-${commentData.id}`)) {
                return;
            }

            const commentHtml = `
            <div class="comment-item bg-white dark:bg-gray-700 rounded-lg p-4 shadow-sm" data-comment-id="${commentData.id}" id="comment-${commentData.id}">
                <div class="flex gap-3">
                    <!-- User Avatar -->
                 <div class="flex-shrink-0">
                    <div class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-800 overflow-hidden bg-[#B59F84] flex items-center justify-center">
                       <img src="${commentData.user.profile_pic_url}" 
                        alt="${commentData.user.fname}'s Profile Picture"
                        class="w-full h-full object-cover">
                        }
                    </div>
                </div>
                   
                    <!-- Comment Content -->
                    <div class="flex-1">
                            <div class="flex-1">
        <!-- Comment Header -->
        <div class="flex justify-between items-start mb-1">
            <div>
                <a href="/profile/${commentData.user.id}" class="hover:underline">
                    ${createUserNameBadge(commentData.user)}
                </a>
                <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                    ${commentData.created_at ? getTimeAgo(new Date(commentData.created_at)) : 'just now'}
                </span>
            </div>
            
            <!-- Comment Options -->
            <div class="relative">
                <button type="button" class="p-1 rounded hover:bg-gray-100 dark:hover:bg-gray-600" onclick="toggleDropdown(${commentData.id})">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 dark:text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </button>
                
                <!-- Dropdown -->
                <div id="dropdown-${commentData.id}" class="absolute right-0 mt-1 w-28 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded shadow z-10 hidden">
                                            <button type="button" onclick="toggleEditForm(${commentData.id})" class="w-full text-left px-3 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                        Edit
                    </button>
                    <button type="button" onclick="deleteComment(${commentData.id})" class="w-full text-left px-3 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Comment Content -->
        <div id="comment-content-${commentData.id}" class="text-gray-800 dark:text-gray-200 mb-2">
            ${commentData.content}
        </div>

        <!-- Engagement Buttons -->
        <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400">
            <!-- Like -->
            <button onclick="toggleLike(${commentData.id})" 
                                            class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200 "
                    id="like-btn-${commentData.id}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span id="like-count-${commentData.id}">0</span>
            </button>

            <!-- Reply -->
                                    <button onclick="startReply(${commentData.id}, '${commentData.user.fname} ${commentData.user.lname}')" 
                                            class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                Reply
            </button>
        </div>
    </div>

    <!-- Inline Edit Form -->
                            <form id="inline-edit-form-${commentData.id}" action="/comments/${commentData.id}" method="POST" class="inline-edit-form hidden mt-2 bg-gray-100 dark:bg-gray-600 p-3 rounded-lg" data-id="${commentData.id}">
        <textarea name="content" rows="2" class="w-full border rounded p-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200">${commentData.content}</textarea>
        <div class="flex gap-2 mt-2">
                                    <button type="submit" class="px-3 py-1 bg-[#B59F84] text-white rounded text-sm hover:bg-[#a08e77] transition-all duration-200">Save</button>
            <button type="button" onclick="cancelEdit(${commentData.id})" class="px-3 py-1 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 text-sm">Cancel</button>
        </div>
    </form>

    <!-- Replies -->
    <div id="replies-${commentData.id}" class="hidden ml-4 mt-3 space-y-3 border-l-2 border-gray-200 dark:border-gray-600 pl-4">
        <!-- Replies will be appended here dynamically -->
    </div>
                    </div>
                </div>
            </div>
        `;

            commentsContainer.insertAdjacentHTML('afterbegin', commentHtml);

            // Scroll to the new comment
            const newComment = document.getElementById(`comment-${commentData.id}`);
            if (newComment) {
                newComment.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            }
        }

        // Toggle like functionality
        function toggleLike(commentId) {
            fetch(`/comments/${commentId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        reaction_type: 'like'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const likeBtn = document.getElementById(`like-btn-${commentId}`);
                        const likeCount = document.getElementById(`like-count-${commentId}`);

                        // Update button appearance
                        if (data.is_liked) {
                            likeBtn.classList.remove('text-gray-500');
                            likeBtn.classList.add('text-[#B59F84]');
                            likeBtn.querySelector('svg').setAttribute('fill', 'currentColor');
                        } else {
                            likeBtn.classList.remove('text-[#B59F84]');
                            likeBtn.classList.add('text-gray-500');
                            likeBtn.querySelector('svg').setAttribute('fill', 'none');
                        }

                        // Update count
                        likeCount.textContent = data.likes_count;
                    }
                })
                .catch(error => {
                    console.error('Error toggling like:', error);
                });
        }

        // Toggle replies display
        function toggleReplies(commentId) {
            const repliesContainer = document.getElementById(`replies-${commentId}`);
            if (repliesContainer) {
                repliesContainer.classList.toggle('hidden');
            }
        }

        function addReplyToDOM(commentData) {
            // ✅ Ensure this is a reply
            if (!commentData.parent_id) {
                console.warn("Tried to add a reply without parent_id:", commentData);
                return;
            }

            // ✅ Find the top-level comment that this reply belongs to
            let topLevelCommentId = commentData.parent_id;

            // Check if the parent is a top-level comment or a reply
            const parentElement = document.getElementById(`comment-${commentData.parent_id}`);
            if (parentElement && parentElement.classList.contains('comment-item')) {
                // Parent is a top-level comment
                topLevelCommentId = commentData.parent_id;
            } else {
                // Parent is a reply, find the top-level comment
                const replyElement = document.getElementById(`reply-${commentData.parent_id}`);
                if (replyElement) {
                    // Get the replies container this reply belongs to
                    const repliesContainer = replyElement.closest('[id^="replies-"]');
                    if (repliesContainer) {
                        const match = repliesContainer.id.match(/replies-(\d+)/);
                        if (match) {
                            topLevelCommentId = parseInt(match[1]);
                        }
                    }
                }
            }

            // ✅ Get the replies container for the top-level comment
            let repliesContainer = document.getElementById(`replies-${topLevelCommentId}`);

            // If no replies container yet, create one under the top-level comment
            if (!repliesContainer) {
                const topLevelComment = document.getElementById(`comment-${topLevelCommentId}`);
                if (topLevelComment) {
                    repliesContainer = document.createElement('div');
                    repliesContainer.id = `replies-${topLevelCommentId}`;
                    repliesContainer.className = 'ml-4 mt-3 space-y-3 border-l-2 border-gray-200 dark:border-gray-600 pl-4';
                    topLevelComment.appendChild(repliesContainer);
                } else {
                    console.warn('Top-level comment not found for reply:', topLevelCommentId);
                    return;
                }
            }

            // ✅ Prevent duplicate reply rendering
            if (document.getElementById(`reply-${commentData.id}`)) {
                return;
            }

            // ✅ Build reply HTML with proper structure (all replies at same level)
            const replyHtml = `
        <div class="reply-item flex gap-3" id="reply-${commentData.id}" data-comment-id="${commentData.id}" data-parent-id="${commentData.parent_id}">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-[#B59F84] rounded-full border-2 border-white dark:border-gray-800 flex items-center justify-center">
                   <img src="${commentData.user.profile_pic_url}" 
                    alt="${commentData.user.fname}'s Profile Picture"
                    class="w-full h-full object-cover">
                </div>
            </div>
            <div class="flex-1">
                <div>
                    <a href="/profile/${commentData.user?.id}" class="hover:underline">
                        ${createUserNameBadge(commentData.user)}
                    </a>
                    <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">just now</span>
                </div>
                <p class="text-sm text-gray-800 dark:text-gray-200">${commentData.content}</p>

                <div class="mt-2 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                    <button onclick="toggleLike(${commentData.id})" 
                            class="flex items-center gap-1 hover:text-[#B59F84] transition-colors duration-200"
                            id="like-btn-${commentData.id}">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span id="like-count-${commentData.id}">0</span>
                    </button>
                    <button onclick="startReply(${commentData.id}, '${commentData.user?.fname ?? ''} ${commentData.user?.lname ?? ''}')" class="hover:text-[#B59F84] transition-colors duration-200">Reply</button>
                </div>
            </div>
        </div>
    `;

            repliesContainer.insertAdjacentHTML('beforeend', replyHtml);

            // Ensure the replies container is visible
            repliesContainer.classList.remove('hidden');

            // Update replies count for the top-level comment
            updateRepliesCount(topLevelCommentId);
        }


        // Helper function to format time ago
        function getTimeAgo(date) {
            const now = new Date();
            const diffInSeconds = Math.floor((now - date) / 1000);

            if (diffInSeconds < 60) {
                return 'just now';
            } else if (diffInSeconds < 3600) {
                const minutes = Math.floor(diffInSeconds / 60);
                return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
            } else if (diffInSeconds < 86400) {
                const hours = Math.floor(diffInSeconds / 3600);
                return `${hours} hour${hours > 1 ? 's' : ''} ago`;
            } else if (diffInSeconds < 2592000) {
                const days = Math.floor(diffInSeconds / 86400);
                return `${days} day${days > 1 ? 's' : ''} ago`;
            } else {
                return date.toLocaleDateString();
            }
        }

        // Helper function to create user name badge with verification status
        function createUserNameBadge(user) {
            let badgeHtml = `<span class="flex items-center space-x-2">
            <span class="font-medium text-gray-900 dark:text-gray-100">${user.fname} ${user.lname}</span>`;

            if (user.verification_status === 'approved') {
                badgeHtml += `
                <span class="inline-flex items-center justify-center w-5 h-5 bg-[#B59F84] text-white rounded-full relative">
                    <!-- Scalloped shape using SVG -->
                    <svg viewBox="0 0 24 24" class="absolute w-full h-full">
                        <path fill="#B59F84" d="M12 0l2.9 4.4 5 1.1-3.6 3.8.9 5-4.2-2.2-4.2 2.2.9-5-3.6-3.8 5-1.1L12 0z"/>
                    </svg>
                    <!-- White checkmark -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </span>`;
            }

            badgeHtml += `</span>`;
            return badgeHtml;
        }

        // Update replies count
        function updateRepliesCount(commentId) {
            const repliesContainer = document.getElementById(`replies-${commentId}`);
            if (repliesContainer) {
                const repliesCount = repliesContainer.querySelectorAll('.reply-item').length;
                const repliesButton = document.querySelector(`button[onclick="toggleReplies(${commentId})"]`);
                if (repliesButton) {
                    repliesButton.textContent = `${repliesCount} ${repliesCount === 1 ? 'reply' : 'replies'}`;
                }
            }
        }
    </script>

    <script>
        // Participants list for @mentions
        window.commentParticipants = [{
                id: {{ $donation->user->id }},
                name: '{{ addslashes($donation->user->fname . ' ' . $donation->user->lname) }}'
            },
            @php $added = collect([$donation->user->id]); @endphp
            @foreach ($donation->comments as $c)
                @if (!$added->contains($c->user->id))
                    {
                        id: {{ $c->user->id }},
                        name: '{{ addslashes($c->user->fname . ' ' . $c->user->lname) }}'
                    },
                    @php $added->push($c->user->id); @endphp
                @endif
                @foreach ($c->replies as $r)
                    @if (!$added->contains($r->user->id))
                        {
                            id: {{ $r->user->id }},
                            name: '{{ addslashes($r->user->fname . ' ' . $r->user->lname) }}'
                        },
                        @php $added->push($r->user->id); @endphp
                    @endif
                @endforeach
            @endforeach
        ];

        (function setupMentions() {
            const suggestions = document.createElement('div');
            suggestions.id = 'mention-suggestions';
            suggestions.className =
                'hidden z-40 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg shadow max-h-48 overflow-auto w-64';
            suggestions.style.position = 'absolute';
            document.body.appendChild(suggestions);

            let activeTextarea = null;

            function filterParticipants(query) {
                const q = query.toLowerCase();
                return window.commentParticipants.filter(p => p.name.toLowerCase().includes(q)).slice(0, 8);
            }

            function positionSuggestions() {
                if (!activeTextarea) return;
                const rect = activeTextarea.getBoundingClientRect();
                const scrollY = window.scrollY || document.documentElement.scrollTop;
                const scrollX = window.scrollX || document.documentElement.scrollLeft;
                suggestions.style.left = (scrollX + rect.left + 8) + 'px';
                suggestions.style.top = (scrollY + rect.top - 6) + 'px';
            }

            function renderSuggestions(list) {
                if (!list.length) {
                    hideSuggestions();
                    return;
                }
                suggestions.innerHTML = list.map(p =>
                    `<button type="button" data-name="${p.name}" class="w-full text-left px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm">@${p.name}</button>`
                ).join('');
                suggestions.classList.remove('hidden');
                positionSuggestions();
            }

            function hideSuggestions() {
                suggestions.classList.add('hidden');
                suggestions.innerHTML = '';
            }

            document.addEventListener('focusin', (e) => {
                if (e.target && e.target.matches('textarea.mentionable')) {
                    activeTextarea = e.target;
                }
            });

            document.addEventListener('input', (e) => {
                if (!(e.target && e.target.matches('textarea.mentionable'))) return;
                activeTextarea = e.target;
                const caretPos = activeTextarea.selectionStart;
                const val = activeTextarea.value.substring(0, caretPos);
                const match = val.match(/(^|\s)@([\w\s]{0,30})$/);
                if (match) {
                    const query = match[2].trim();
                    renderSuggestions(query ? filterParticipants(query) : window.commentParticipants.slice(0,
                        6));
                } else {
                    hideSuggestions();
                }
                positionSuggestions();
            });

            suggestions.addEventListener('click', (e) => {
                const btn = e.target.closest('button[data-name]');
                if (!btn || !activeTextarea) return;
                const name = btn.getAttribute('data-name');
                const caret = activeTextarea.selectionStart;
                const before = activeTextarea.value.substring(0, caret);
                const after = activeTextarea.value.substring(caret);
                const replaced = before.replace(/(^|\s)@([\w\s]{0,30})$/, `$1@${name} `);
                activeTextarea.value = replaced + after;
                const newCaret = replaced.length;
                activeTextarea.setSelectionRange(newCaret, newCaret);
                activeTextarea.focus();
                hideSuggestions();
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('#mention-suggestions') && !e.target.closest('textarea.mentionable'))
                    hideSuggestions();
            });

            document.addEventListener('DOMContentLoaded', function() {
                new Swiper(".mySwiper", {
                    loop: true,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    effect: "slide", // you can use "fade" or "coverflow"
                    speed: 800,
                });
            });
        })();

        //upload proof script
        function openProofModal(donationId) {
            const modal = document.getElementById('proofModal');
            const form = document.getElementById('proofForm');
            form.action = `/donations/${donationId}/mark-as-donated`;
            modal.classList.remove('hidden');
        }

        function closeProofModal() {
            document.getElementById('proofModal').classList.add('hidden');
        }
    </script>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
        }

        .comment-item:hover .line-clamp-3 {
            -webkit-line-clamp: unset;
            display: block;
        }

        /* Dynamic width for comments */
        .comment-bubble {
            max-width: 40%;
            width: fit-content;
        }

        #reply-indicator {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #replying-to {
            font-weight: 500;
            color: #6c757d;
        }
    </style>
</x-app-layout>
