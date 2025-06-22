<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Favourites extends Component
{
    public $favourites;

    protected $listeners = [
        'updatedFavourites' => 'updatedFavourites'
    ];

    public function mount()
    {
        $this->favourites = auth()->user()->favouriteOffers()->get();
    }

    public function updatedFavourites()
    {
        $this->favourites = auth()->user()->favouriteOffers()->get();
    }

    #[Layout('components.layouts.guest')]
    public function render()
    {
        return view('livewire.favourites');
    }
}
