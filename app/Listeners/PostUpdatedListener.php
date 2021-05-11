<?php

namespace App\Listeners;

use App\Events\PostUpdatedEvent;
use App\Http\Services\MailService;
use App\Mail\PostUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostUpdatedListener
{
    public function handle(PostUpdatedEvent $event)
    {
        (new MailService())->sendPost(new PostUpdated($event->post));
    }
}
