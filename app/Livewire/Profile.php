<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Profile extends Component
{
    public $offers;
    public $activeCategory = 'gemte-tilbud';

    protected $listeners = [
        'passwordChanged' => 'handlePasswordChanged',
        'userDetailsUpdated' => 'handleUserDetailsUpdated'
    ];

    public function mount()
    {
        $this->offers = auth()->user()->favouriteOffers()->get();
    }

    public function setActiveCategory($category)
    {
        $this->activeCategory = $category;
    }

    public function handlePasswordChanged()
    {
        $this->dispatch('showNotification', 'Password changed successfully.')
            ->to('components.notification');
    }

    public function handleUserDetailsUpdated()
    {
        $this->dispatch('showNotification', 'User details updated successfully.')
            ->to('components.notification');
    }

    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.profile');
    }
}
