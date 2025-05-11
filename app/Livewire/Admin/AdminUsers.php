<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Notifications\InviteUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Password;

class AdminUsers extends Component
{
    use WithPagination;

    public $type = 'employees';
    public $company;

    protected $rules = [
        'inviteEmail' => 'required|email'
    ];

    public function mount()  
    {
        $this->company = auth()->user()->company;
    }

    #[On('refresh')] 
    public function refresh()
    {
        // Reset pagination when new data is added
        $this->resetPage();
    }

    public function sendResetLink($userId)
    {
        $user = User::find($userId);
        
        if ($user) {
            // Send password reset link
            $status = Password::sendResetLink([
                'email' => $user->email
            ]);

            if ($status === Password::RESET_LINK_SENT) {
                // Notify admin using the notification component
                $this->dispatch('showNotification', 'Password reset link has been sent to ' . $user->email)
                    ->to('components.notification');
            } else {
                $this->dispatch('showNotification', 'Unable to send reset link. Please try again.')
                    ->to('components.notification');
            }
        }
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {
        $query = User::query();
        
        $query->where('company_id', auth()->user()->company_id);
        
        // If type is employees, only show employees
        if ($this->type == 'employees') {
            $query->role('user');
        }

        if ( $this->type == 'managers') {
            $query->role('manager');
        }

        return view('livewire.admin.admin-users', [
            'users' => $query->paginate(20)
        ]);
    }
}
