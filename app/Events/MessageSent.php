<?php

namespace App\Events;

use App\User;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that sent the message
     *
     * @var Authenticatable
     */
    public $user;

    /**
     * Message details
     *
     * @var Message
     */
    public $message;

    public string $chat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Authenticatable $user, Message $message, string $chat)
    {
        $this->user = $user;
        $this->message = $message;
        $this->chat = $chat;
    }

    /**
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        Log::info(json_encode(new PrivateChannel($this->chat)));
        return new PrivateChannel($this->chat);
    }
}
