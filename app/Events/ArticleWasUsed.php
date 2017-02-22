<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticleWasUsed
{
    use InteractsWithSockets, SerializesModels;

    public $user;
    public $article;
    public $is_Admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user , $article,$is_Admin)
    {
        //
        $this->user = $user;
        $this->article = $article;
        $this->is_Admin = $is_Admin;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
