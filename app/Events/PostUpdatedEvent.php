<?php

namespace App\Events;

use App\Models\Post;
use App\Models\PostHistory;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostUpdatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Post $post;
    public PostHistory $history;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->history = $post->latestHistory();
    }

    public function broadcastOn() : Channel
    {
        return new Channel('admins');
    }
}
