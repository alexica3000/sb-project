<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreated as PostMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostCreatedNotification
{
    public function __construct()
    {
        //
    }

    public function handle(PostCreated $event)
    {
        Mail::to(config('mail.to.address'))
            ->send(new PostMail($event->post));
    }
}
