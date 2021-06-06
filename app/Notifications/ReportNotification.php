<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportNotification extends Notification
{
    use Queueable;

    private string $fileNameReport;

    public function __construct(string $fileNameReport)
    {
        $this->fileNameReport = $fileNameReport;
    }

    public function via($notifiable) : array
    {
        return ['mail'];
    }

    public function toMail($notifiable) : MailMessage
    {
        return (new MailMessage)
                    ->line('New report has been created.')
                    ->line('Please check email attachment.')
                    ->attach(storage_path() . "/app/" . $this->fileNameReport);
    }
}
