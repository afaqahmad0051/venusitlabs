<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactFormSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public array $contactFormData)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Contact Form Submission')
            ->greeting('Hello,')
            ->line('You have received a new contact form submission from your website.')
            ->line('Here are the details:')
            ->line('**Name:** '.$this->contactFormData['user_name'])
            ->line('**Email:** '.$this->contactFormData['user_email'])
            ->line('**Subject:** '.$this->contactFormData['subject'])
            ->line('**Message:**')
            ->line($this->contactFormData['message'])
            ->line('Please follow up with the user promptly to address their query.')
            ->salutation('Best regards, VenusItLabs');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
