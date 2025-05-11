<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Notifications\InviteUser;

class UserInvitation extends Component
{
    public $type;
    public $inviteEmail;
    public $prompt = false;
    public $token;

    protected $rules = [
        'inviteEmail' => 'required|email'
    ];

    public function mount($type = 'employees', $token)
    {
        $this->type = $type;
        $this->token = $token;
    }

    public function togglePrompt()
    {
        $this->prompt = !$this->prompt;
    }

    public function sendInvitation()
    {
        $this->validate();
        
        $user = request()->user();
        
        $company = $user->company;

        // Generate unique token
        $token = Str::random(32);

        // Create invitation record
        $invitation = Invitation::create([
            'email' => $this->inviteEmail,
            'type' => 'user',
            'token' => $token,
            'company_id' => $company->id,
            'expires_at' => now()->addDays(7),
            'user_id' => $user->id
        ]);

        $invitation_url = URL::signedRoute('register', [
            'token' => $invitation->token
        ]);


        // Send notification instead of Mail
        Notification::route('mail', $this->inviteEmail)
            ->notify(new InviteUser($invitation_url));

        // Reset form
        $this->reset('inviteEmail');

        // Show success message
        session()->flash('message', 'Invitationen blev sendt!');
    }

    public function render()
    {
        return view('livewire.user-invitation');
    }
}
