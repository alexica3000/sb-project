<?php

namespace App\Listeners;

use App\Events\PostAffectedEvent;
use App\Mail\PostCreated as PostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PostAffectedListener
{
    public function handle(PostAffectedEvent $event)
    {
        switch ($event->type) {
            case PostAffectedEvent::TYPE_CREATED:
                break;
            default:
                logger()->error('This type of event doesn\'t exist.');
        }
    }
}
