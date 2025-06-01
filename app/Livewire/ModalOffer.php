<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Offer;

class ModalOffer extends ModalComponent
{
    public $offer;

    public function render()
    {
        return view('livewire.modal-offer');
    }

    public function mount($offer_ulid)
    {
        $this->offer = Offer::where('ulid', $offer_ulid)->first();
    }

    public function maxWidth(): string
    {
        return 'max-w-7xl';
    }
}
