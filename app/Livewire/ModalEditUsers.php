<?php

namespace App\Livewire;

use App\Livewire\Admin\AdminUsers;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ModalEditUsers extends ModalComponent
{
    public $user;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $type = [];

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8',
        'type' => 'required|array',
    ];

    public function mount($user_ulid = null)
    {
        if ($user_ulid) {
            $this->user = User::where('ulid', $user_ulid)->first();

            if ($this->user) {
                $this->first_name = $this->user->first_name;
                $this->last_name = $this->user->last_name;
                $this->email = $this->user->email;
                $this->type = ((int)$this->user->type === 1 || (int)$this->user->type === 2) ? [(int)$this->user->type] : [1, 2];

            }
        }
    }

    public function update()
    {
        $this->validate();

        $type = isset($this->type[0]) ? (int) $this->type[0] : null;

        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'type' => count($this->type) === 2 ? null : $type ?? null,
        ];

        // if ($this->password) {
        //     $data['password'] = Hash::make($this->password);
        // }

        if ($this->user) {
            $this->user->update($data);
        }

        $this->dispatch('refresh')->to(AdminUsers::class);

        $this->closeModal();
    }

    public function deleteUser()
    {
        if ($this->user) {
            $this->user->delete();

            // Notify admin
            $this->dispatch('showNotification', 'User has been deleted successfully')
                ->to('components.notification');

            // Refresh the users list
            $this->dispatch('refresh')->to(AdminUsers::class);

            $this->closeModal();
        }
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function render()
    {
        return view('livewire.modal-edit-users');
    }
}
