<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentMade
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name;
    public $email;
    public $mobile;
    public $message1;
    public $message2;
    public $ref;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $email, $mobile, $message1, $message2, $ref)
    {
        $this->email = $email;
        $this->mobile = $mobile;
        $this->name = $name;
        $this->message1 = $message1;
        $this->message2 = $message2;
        $this->ref = $ref;
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
