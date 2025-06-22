<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offer;
use WireElements\Pro\Components\SlideOver\SlideOver;

class OfferContactSlideover extends SlideOver
{
    public $offer;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'phone' => 'required|min:8',
        'message' => 'required|min:10'
    ];

    protected $messages = [
        'name.required' => 'Dit navn er påkrævet',
        'email.required' => 'Din email er påkrævet',
        'email.email' => 'Indtast venligst en gyldig email',
        'phone.required' => 'Dit telefonnummer er påkrævet',
        'phone.min' => 'Telefonnummer skal være mindst 8 cifre',
        'message.required' => 'Besked er påkrævet',
        'message.min' => 'Beskeden skal være mindst 10 tegn'
    ];
    
    public static function attributes(): array
    {
        return [
            // Set the slide-over size to 2xl, you can choose between:
            // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl, fullscreen
            'size' => '2xl',
        ];
    }

    public function mount($offer_ulid)
    {
        $this->offer = Offer::where('ulid', $offer_ulid)->first();
    }

    public function render()
    {
        return view('livewire.offer-contact-slideover', [
            'offer' => $this->offer,
        ]);
    }
}
