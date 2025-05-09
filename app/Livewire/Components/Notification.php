<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Notification extends Component
{
    public $message = '';
    public $show = false;

    protected $listeners = ['showNotification'];

    public function showNotification($message)
    {
        $this->message = $message;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.components.notification');
    }
} 