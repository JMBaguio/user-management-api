<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Order;

class OrderPlacedNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $receiverId;

    public function __construct(Order $order, $receiverId)
    {
        $this->order = $order;
        $this->receiverId = $receiverId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('notifications-channel.' . $this->receiverId);
    }

    public function broadcastAs()
    {
        return 'order.placed.notification';
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->order->id,
            'buyer_name' => $this->order->buyer->fname . ' ' . $this->order->buyer->lname,
            'product_name' => $this->order->product->name,
            'message' => "You have received a new order from {$this->order->buyer->fname} {$this->order->buyer->lname}.",
            'created_at' => $this->order->created_at->diffForHumans(),
        ];
    }
}
