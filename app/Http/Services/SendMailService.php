<?php

namespace App\Http\Services;

use App\Mail\PostCreated as PostMail;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class SendMailService
{
    public function send()
    {
        Mail::to(config('mail.to.address'))
            ->send(new PostMail($event->post));
    }
}
