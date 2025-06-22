<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OfferCategory;
use App\Models\Offer;
use Livewire\Attributes\Layout;

class Category extends Component
{

    public $category;

    public $offers;

    public $categories;

    public function mount($category_ulid)
    {
        $this->categories = OfferCategory::whereHas('offers', function($query) {
            $query->where('start_date', '<=', now())
                  ->where('end_date', '>=', now());
        }, '>=', 1, 'and', function($query) {
            $query->where('offers.category_id', '=', 'offer_categories.id');
        })->get();

        
        $this->category = OfferCategory::where('ulid', $category_ulid)->first();

        $this->offers = Offer::where('category_id', $this->category->id)->get();
    }

    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.category');
    }
}
