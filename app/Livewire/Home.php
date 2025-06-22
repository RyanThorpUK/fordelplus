<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\OfferCategory;

class Home extends Component
{   
    public $premiumOffers;
    
    public $offers;

    public $paginatedOffers;

    public $displayCategories;

    public $categories;

    public function mount()
    {
        // Get first 3 offers
        $userType = (int) request()->user()->type;
        $offers = $userType === 1 ? [49, 62, 56, 24] : [49, 59, 29, 66];
        // ->where('start_date', '<=', now())->where('end_date', '>=', now())
        $this->premiumOffers = Offer::whereIn('id', $offers)->get();
        // $this->premiumOffers = Offer::where('start_date', '<=', now())->where('end_date', '>=', now())->get();

        $this->categories = OfferCategory::whereHas('offers', function($query) {
            $query->where('start_date', '<=', now())
                  ->where('end_date', '>=', now());
        }, '>=', 1, 'and', function($query) {
            $query->where('offers.category_id', '=', 'offer_categories.id');
        })->get();

        $categories = $userType === 1 ? [2, 25, 17, 23, 13] : [16, 17,8, 2, 36, 13, 12];
        $displayCategories = OfferCategory::whereIn('id', $categories)->get();

        foreach($displayCategories as $category) {
            $this->displayCategories[] = $category;
        }

        // $query = Offer::where('start_date', '<=', now())
        //     ->where('end_date', '>=', now())
        //     ->where('category_id', $category->id);
        
        foreach($this->displayCategories as $category) {

            // ::where('start_date', '>=', now())
            // ->where('end_date', '>=', now())

            $data['name'] = $category->name;
            $data['offers'] = Offer::where('category_id', $category->id)
            ->get();
            $this->paginatedOffers[] = $data;
        }
        

        // // Get remaining offers
        // $this->offers = Offer::skip(3)->take(20)->get();
    }
    
    #[Layout('components.layouts.guest')] 
    public function render()
    {

        return view('livewire.home', [
            'paginatedOffers' => $this->paginatedOffers
        ]);
    }
}
