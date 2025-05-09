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
    public $company;

    public function __construct(Invitation $invitation, $company)
    {
        $this->invitation = $invitation;
        $this->company = $company;
    }

    public function build()
    {
        $url = url("/register?token={$this->invitation->token}");
        
        return $this->markdown('emails.invitation')
                    ->subject($this->company->name . ' har inviteret dig til at blive manager på FordelPlus-platformen.')
                    ->with([
                        'url' => $url,
                        'expiresAt' => $this->invitation->expires_at->format('Y-m-d H:i:s')
                    ]);
    }
} 