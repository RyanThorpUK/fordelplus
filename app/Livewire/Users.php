<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
class Users extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {
        return view('livewire.users');
    }
}
