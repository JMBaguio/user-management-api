<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\MessageService;

class PrivateChatController extends Controller
{
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function index()
    {
        $conversations = $this->messageService->getUserConversations(Auth::id());

        return view('messages.index', [
            'conversations' => $conversations
        ]);
    }

    public function show(User $user)
    {
        $chatData = $this->messageService->getChatData(Auth::id(), $user->id);

        if (isset($chatData['error'])) {
            abort(403, $chatData['error']);
        }

        $conversations = $this->messageService->getUserConversations(Auth::id());

        return view('private-chat', [
            'recipient' => $chatData['receiver'],
            'privateMessages' => $chatData['messages'],
            'conversations' => $conversations
        ]);
    }

    public function send(Request $request, User $user)
    {
        $request->validate([
            'message' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240' // 10MB max
        ]);

        $messageContent = trim($request->input('message', ''));
        $hasMessage = !empty($messageContent);
        $hasImage = $request->hasFile('image');

        if (!$hasMessage && !$hasImage) {
            return response()->json(['error' => 'Message or image is required.'], 400);
        }

        $result = $this->messageService->sendPrivateMessage(
            Auth::id(),
            $user->id,
            $hasMessage ? $messageContent : null,
            $hasImage ? $request->file('image') : null
        );

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 400);
        }

        $message = $result['message'];
        
        // Ensure user relationship is loaded
        if (!$message->relationLoaded('user')) {
            $message->load('user');
        }
        
        // Add image_url for easy access
        $message->setAttribute('image_url', $message->image_path
            ? asset('storage/' . $message->image_path)
            : null);

        // Return message as resource/array for JSON serialization
        return response()->json([
            'message' => [
                'id' => $message->id,
                'user_id' => $message->user_id,
                'receiver_id' => $message->receiver_id,
                'message' => $message->message,
                'image_path' => $message->image_path,
                'image_url' => $message->image_url,
                'created_at' => $message->created_at,
                'user' => [
                    'id' => $message->user->id,
                    'fname' => $message->user->fname,
                    'lname' => $message->user->lname,
                    'profile_pic_url' => $message->user->profileImageUrl(),
                ]
            ]
        ]);
    }
}
