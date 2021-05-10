<?php

namespace App\Listeners;

use App\Events\PostCreatedEvent;
use App\Http\Services\MailService;
use App\Mail\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostCreatedListener
{
    public function handle(PostCreatedEvent $event)
    {
        (new MailService())->sendPost(new PostCreated($event->post));
    }
}
