<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Comment;

class CommentNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;
    public $receiverId;

    public function __construct(Comment $comment, $receiverId)
    {
        $this->comment = $comment;
        $this->receiverId = $receiverId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications-channel.' . $this->receiverId);
    }

    public function broadcastAs()
    {
        return 'comment.notification';
    }

    public function broadcastWith()
    {
        return [
            'id'        => $this->comment->id,
            'content'   => $this->comment->content,
            'from_user' => $this->comment->user->fname . ' ' . $this->comment->user->lname,
            'product_id'=> $this->comment->product_id,
            'created_at'=> $this->comment->created_at->diffForHumans(),
        ];
    }
}
