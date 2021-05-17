<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Collection;

class NewPostsNotification extends Notification
{
    use Queueable;

    public Collection $posts;

    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('New Posts')
            ->markdown('mail.posts.new-posts', ['posts' => $this->posts, 'user' => $notifiable]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
