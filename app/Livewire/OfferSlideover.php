<?php

namespace App\Livewire;

use App\Models\Offer;
use WireElements\Pro\Components\SlideOver\SlideOver;

class OfferSlideover extends SlideOver
{

    public $width = 'max-w-screen-2xl';

    public $offer;

    public function mount($offer_ulid)
    {
        $this->offer = Offer::where('ulid', $offer_ulid)->first();
    }

    public static function attributes(): array
    {
        return [
            // Set the slide-over size to 2xl, you can choose between:
            // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, fullscreen
            'size' => '4xl',
        ];
    }
    
    public function render()
    {
        return view('livewire.offer-slideover', [
            'offer' => $this->offer,
        ]);
    }
}
