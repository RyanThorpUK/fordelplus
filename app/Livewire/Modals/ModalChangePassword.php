<?php

namespace App\Livewire\Modals;

use App\Livewire\Profile;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ModalChangePassword extends ModalComponent
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function changePassword()
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        auth()->user()->update([
            'password' => Hash::make($this->password)
        ]);

        $this->dispatch('passwordChanged')->to(Profile::class);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.modal-change-password');
    }
} 