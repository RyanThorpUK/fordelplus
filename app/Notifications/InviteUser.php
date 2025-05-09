<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteUser extends Notification
{
    use Queueable;

    private $invitation_url;

    /**
     * Create a new notification instance.
     */
    public function __construct($invitation_url)
    {
        $this->invitation_url = $invitation_url;
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
            ->subject('Velkommen til FordelPlus!')
            ->greeting('Hej,')
            ->line('Velkommen til FordelPlus! Vi er glade for at du er med os. Kom igang med at tilmelde dig her.')
            ->action('Bekræft Email', $this->invitation_url)
            ->line('Når du har tilmeldt dig, kan du logge ind på FordelPlus og starte at bruge vores platform!')
            ->line('Hvis du har spørgsmål, så kan du altid kontakte os på support@fordelplus.dk.');
            // ->view('emails.invitation', [
            //     'user' => $this->user,
            //     'company' => $this->company,
            // ])
            // ->markdown('notifications::email', [
            //     'user' => $this->user,
            //     'company' => $this->company,
            // ]);
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
