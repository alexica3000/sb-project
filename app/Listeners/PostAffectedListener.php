<?php

namespace App\Listeners;

use App\Events\PostAffectedEvent;
use App\Http\Services\MailService;
use App\Mail\PostCreated;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PostAffectedListener
{
    public function handle(PostAffectedEvent $event)
    {
        switch ($event->type) {
            case PostAffectedEvent::TYPE_CREATED:
                (new MailService())->sendPost(new PostCreated($event->post));
                break;
            case PostAffectedEvent::TYPE_UPDATED:
                (new MailService())->sendPost(new PostUpdated($event->post));
                break;
            case PostAffectedEvent::TYPE_DELETED:
                (new MailService())->sendPost((new PostDeleted($event->post)));
                break;
            default:
                logger()->error('This type of event doesn\'t exist.');
        }
    }
}
