<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Product;

class ProductStatusNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $receiverId;
    public $status;

    /**
     * Create a new event instance.
     *
     * @param Product $product
     * @param int $receiverId
     * @param string $status
     */
    public function __construct(Product $product, $receiverId, $status)
    {
        $this->product = $product;
        $this->receiverId = $receiverId;
        $this->status = $status; // "approved" or "rejected"
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notifications-channel.' . $this->receiverId);
    }

    /**
     * The event name to broadcast as.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'product.status.notification';
    }

    /**
     * The data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        // Create a friendly message based on status
        $message = $this->status === 'approved' 
            ? "Your product {$this->product->name} has been approved" 
            : "Your product {$this->product->name} has been rejected";

        return [
            'id'         => $this->product->id,
            'name'       => $this->product->name,
            'status'     => $this->status,
            'message'    => $message,
            'from_user'  => 'Thrift-IT',
            'created_at' => $this->product->created_at->diffForHumans(),
        ];
    }
}
