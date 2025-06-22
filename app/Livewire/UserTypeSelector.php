<?php

namespace App\Livewire;

use Livewire\Component;

class UserTypeSelector extends Component
{
    public $userType;

    public function mount()
    {
        $this->userType = request()->user()->type;
    }

    public function setUserType($type)
    {
       request()->user()->type = $type;
       request()->user()->save();

       $this->skipRender();
       $this->dispatch('refresh-browser');
    }

    public function render()
    {
        return view('livewire.user-type-selector');
    }
}
