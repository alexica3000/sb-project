<?php

namespace App\Listeners;

use App\Events\PostDeletedEvent;
use App\Http\Services\MailService;
use App\Mail\PostDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostDeletedListener
{
    public function handle(PostDeletedEvent $event)
    {
        (new MailService())->sendPost(new PostDeleted($event->post));
    }
}
