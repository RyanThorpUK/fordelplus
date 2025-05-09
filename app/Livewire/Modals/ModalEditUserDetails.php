<?php

namespace App\Livewire\Modals;

use App\Livewire\Profile;
use LivewireUI\Modal\ModalComponent;

class ModalEditUserDetails extends ModalComponent
{
    public $first_name;
    public $last_name;
    public $email;

    public function mount()
    {
        $user = auth()->user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public function updateDetails()
    {
        $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
        ]);

        auth()->user()->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
        ]);

        $this->dispatch('userDetailsUpdated')->to(Profile::class);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.modal-edit-user-details');
    }
} 