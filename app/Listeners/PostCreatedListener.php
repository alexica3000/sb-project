<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Http\Services\MailService;
use App\Http\Services\Pushall;
use App\Mail\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCreatedListener
{
    private $pushall;

    public function __construct(Pushall $pushall)
    {
        $this->pushall = $pushall;
    }

    public function handle(PostCreatedEvent $event)
    {
        (new MailService())->sendPost(new PostCreated($event->post));
        $this->pushall->send('Hello', 'New Post has been created!');
    }
}
