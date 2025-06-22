<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Offer extends Component
{
    public $offer;

    public $userFavourites;

    public $isFavourited = false;

    public $classes = [];

    public $components = [];


    public function mount($offer, $userFavourites = false, $classes = [], $components = [])
    {
        $this->offer = $offer;
        $this->classes = $classes;
        $this->components = $components;
        
        if ( $userFavourites === true ) {
            $this->isFavourited = true;
        } elseif ( $userFavourites ) {
            $this->isFavourited = $userFavourites->pluck('offer_id')->contains($this->offer->id);
        } else {
            $this->isFavourited = false;
        }
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if ($this->isFavourited) {
            // Remove from favorites
            $user->favourites()->where('offer_id', $this->offer->id)->delete();
            $this->isFavourited = false;
        } else {
            // Add to favorites
            $user->favourites()->create(['offer_id' => $this->offer->id]);
            $this->isFavourited = true;
        }

        $this->dispatch('updatedFavourites');
    }

    public function render()
    {
        return view('livewire.components.offer');
    }
}
