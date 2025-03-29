<?php

namespace App\Livewire;

use App\Models\Offer;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
class AllOffers extends Component
{
    public $offers;
    
    public function mount()
    {

        $this->offers = Offer::all();

        // $this->offers = collect([
        //     (object) [
        //         'name' => 'Offer 1',
        //         'start_date' => Carbon::now()->addDays(1),
        //         'end_date' => Carbon::now()->addDays(10),
        //     ],
        // ]);
    }

    #[On('refresh')] 
    public function refresh()
    {
        $this->offers = Offer::all();
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {
        return view('livewire.all-offers');
    }
}
