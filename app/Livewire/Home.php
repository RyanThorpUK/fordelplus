<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Home extends Component
{   
    public $premiumOffers;
    
    public $offers;

    public function mount()
    {
        // Get first 3 offers
        $this->premiumOffers = Offer::limit(3)->where('start_date', '<=', now())->where('end_date', '>=', now())->get();

        // // Get remaining offers
        // $this->offers = Offer::skip(3)->take(20)->get();
    }
    
    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.home');
    }
}
