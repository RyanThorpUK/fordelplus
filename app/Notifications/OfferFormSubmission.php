<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferFormSubmission extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        $message = (new MailMessage)
            ->subject('Fordelplus | Ny besked fra din tilbudsform');

        if (isset($this->data['message'])) {
            $message->line('Message: ' . $this->data['message']);
        }

        if (isset($this->data['name'])) {
            $message->line('Name: ' . $this->data['name']);
        }

        if (isset($this->data['email'])) {
            $message->line('Email: ' . $this->data['email']);
        }

        if (isset($this->data['phone'])) {
            $message->line('Phone: ' . $this->data['phone']);
        }

        return $message;
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
