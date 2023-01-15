<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DutyPaid
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $email;
    public $mobile;
    public $message;
    public $msg_type;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $email, $mobile, $message, $msg_type)
    {
        $this->email = $email;
        $this->mobile = $mobile;
        $this->name = $name;
        $this->message = $message;
        $this->msg_type = $msg_type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
