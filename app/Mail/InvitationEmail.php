<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitation;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        $url = url("/register?token={$this->invitation->token}");
        
        return $this->markdown('emails.invitation')
                    ->subject('You have been invited to join FordelPlus')
                    ->with([
                        'url' => $url,
                        'expiresAt' => $this->invitation->expires_at->format('Y-m-d H:i:s')
                    ]);
    }
} 