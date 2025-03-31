<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Mail\InvitationEmail;
use Illuminate\Support\Facades\Mail;

class Users extends Component
{
    public $users;
    public $inviteEmail;
    public $type = 'employees';
    public $prompt = false;
    
    protected $rules = [
        'inviteEmail' => 'required|email'
    ];

    public function mount($type = 'employees')
    {
        $this->type = $type;
        $this->prompt = false;
        $this->users = User::all();
    }

    public function togglePrompt()
    {
        $this->prompt = !$this->prompt;
    }

    public function sendInvitation()
    {
        $this->validate();

        // Generate unique token
        $token = Str::random(32);

        // Create invitation record
        $invitation = Invitation::create([
            'email' => $this->inviteEmail,
            'token' => $token,
            'expires_at' => now()->addDays(7)
        ]);

        // Send email
        Mail::to($this->inviteEmail)->send(new InvitationEmail($invitation));

        // Reset form
        $this->reset('inviteEmail');

        // Show success message
        session()->flash('message', 'Invitation sent successfully!');
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {
        return view('livewire.users');
    }
}
