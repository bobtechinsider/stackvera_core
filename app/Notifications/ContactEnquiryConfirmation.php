<?php

namespace App\Notifications;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactEnquiryConfirmation extends Notification implements ShouldQueue
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
            ->subject(__('contact.confirmation.subject'))
            ->view(
                ['mail.contact-confirmation', 'mail.contact-confirmation-text'],
                ['enquiry' => $this->enquiry],
            );
    }
}
