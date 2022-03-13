<?php

namespace App\Events\websocket;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;

class SendMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $message;
    public $api;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $api)
    {
        $this->message = $message;
        $this->api = $api;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-communication');
    }

    public function broadcastAs(){
        return 'SendMessage';
    }

    public function broadcastWith(){
        return [
            'message' => $this->message,
            'api' => $this->api
        ];
    }
}
