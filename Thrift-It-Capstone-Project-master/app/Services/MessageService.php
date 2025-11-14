<?php

namespace App\Services;

use App\Repositories\MessageRepository;
use App\Models\Message;
use App\Models\User;
use App\Events\PrivateMessageSent;

class MessageService
{
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function getPrivateMessages($userId, $receiverId)
    {
        return $this->messageRepository->getPrivateMessages($userId, $receiverId);
    }

    public function createMessage(array $data)
    {
        return $this->messageRepository->create($data);
    }

    public function findMessage($id)
    {
        return $this->messageRepository->find($id);
    }

    public function updateMessage($messageId, array $data)
    {
        $message = $this->messageRepository->find($messageId);
        return $this->messageRepository->update($message, $data);
    }

    public function deleteMessage($messageId)
    {
        $message = $this->messageRepository->find($messageId);
        return $this->messageRepository->delete($message);
    }

    public function sendPrivateMessage($senderId, $receiverId, $messageContent, $imageFile = null)
    {
        // Validate message content - handle null or empty string
        $messageText = $messageContent ? trim($messageContent) : '';
        $hasMessage = !empty($messageText);
        $hasImage = $imageFile !== null;

        if (!$hasMessage && !$hasImage) {
            return ['error' => 'Message or image is required.'];
        }

        if ($hasMessage && strlen($messageText) > 1000) {
            return ['error' => 'Message cannot exceed 1000 characters.'];
        }

        // Handle image upload
        $imagePath = null;
        if ($hasImage) {
            try {
                $imagePath = $imageFile->store('chat_images', 'public');
            } catch (\Exception $e) {
                return ['error' => 'Failed to upload image: ' . $e->getMessage()];
            }
        }

        // Create the message (use empty string for image-only messages since DB doesn't allow null)
        // TODO: Run migration to make message column nullable for proper null handling
        $message = $this->messageRepository->createMessageWithUser(
            $senderId, 
            $receiverId, 
            $hasMessage ? $messageText : '', 
            $imagePath
        );

        // Broadcast the event
        broadcast(new PrivateMessageSent($message, User::find($receiverId)))->toOthers();

        return ['success' => true, 'message' => $message];
    }

    public function canUserSendMessage($senderId, $receiverId)
    {
        // Check if sender and receiver are different users
        if ($senderId === $receiverId) {
            return ['error' => 'You cannot send a message to yourself.'];
        }

        // Check if receiver exists and is active
        $receiver = User::find($receiverId);
        if (!$receiver) {
            return ['error' => 'Receiver not found.'];
        }

        if (!$receiver->is_active) {
            return ['error' => 'Cannot send message to inactive user.'];
        }

        return ['success' => true, 'receiver' => $receiver];
    }

    public function getChatData($userId, $receiverId)
    {
        $validation = $this->canUserSendMessage($userId, $receiverId);
        if (isset($validation['error'])) {
            return $validation;
        }

        $messages = $this->getPrivateMessages($userId, $receiverId);
        $receiver = $validation['receiver'];

        return [
            'success' => true,
            'messages' => $messages,
            'receiver' => $receiver
        ];
    }

    public function getUserConversations($userId)
    {
        return $this->messageRepository->getUserConversations($userId);
    }
} 