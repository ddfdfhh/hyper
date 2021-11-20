<?php
 
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

//use App\Message;
 
class NewMessageNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    public $message, $to,$from;
 
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $message,$to,$from)
    {
        $this->message = $message;
        $this->to = $to;
        $this->from = $from;
    }
 
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    { 
        return new PrivateChannel('group');
    }
   
}