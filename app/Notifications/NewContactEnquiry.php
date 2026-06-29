<?php

namespace App\Notifications;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactEnquiry extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public ContactEnquiry $enquiry) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New contact enquiry from {$this->enquiry->name}")
            ->replyTo($this->enquiry->email, $this->enquiry->name)
            ->view(
                ['mail.contact-enquiry', 'mail.contact-enquiry-text'],
                ['enquiry' => $this->enquiry],
            );
    }
}
