<?php

namespace App\Http\Services;

use App\Mail\PostCreated;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private string $email;

    public function __construct($email = null)
    {
        $this->email = $mail ?? config('mail.to.address');
    }

    public function sendPost(Mailable $mailable)
    {
        Mail::to($this->email)
            ->send($mailable);
    }
}
