<?php

namespace App\Livewire\Admin;

use App\Models\Offer;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class AdminAllOffers extends Component
{
    use WithPagination;
    
    public function mount()
    {
        // Remove the mount method as we'll handle pagination in render
    }

    #[On('refresh')] 
    public function refresh()
    {
        // Reset pagination when new data is added
        $this->resetPage();
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {

        $offers = Offer::where('company_id', auth()->user()->company_id)
            ->orderBy('start_date', 'desc')
            ->paginate(10);

        return view('livewire.admin.admin-all-offers', [
            'offers' => $offers
        ]);
    }
}
