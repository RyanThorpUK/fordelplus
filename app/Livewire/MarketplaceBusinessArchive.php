<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class MarketplaceBusinessArchive extends Component
{
    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.marketplace-business-archive');
    }
}
