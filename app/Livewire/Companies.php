<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Companies extends Component
{
    public $search;
    public $companies;
    public $categories;
    public $activeCategory;
    public $activeChildCategory;

    public function mount()
    {
        $this->search = request()->get('s');
        $this->categories = [];

        $this->getCompanies();
        $this->getCategories();
    }

    public function getCompanies()
    {
        $this->companies = Company::with(['offers.category.parent'])
            ->whereHas('offers', function($query) {
                $query->where('start_date', '<=', now())
                      ->where('end_date', '>=', now());
            })
            ->withCount(['activeOffers']);
           
        if ($this->search) {
            $this->companies = $this->companies->where('name', 'like', '%' . $this->search . '%');
        }

        $this->companies = $this->companies->get();

        // If active Child Category is set, get the companies that have offers in that category
        if ($this->activeChildCategory) {
            $this->companies = $this->companies->filter(function($company) {
                return $company->offers->contains('category_id', $this->activeChildCategory);
            });
        }
    }

    public function getCategories()
    {
        // Get categories structured as parent -> children with counts
        $displayCategories = [];
        foreach ($this->companies as $company) {
            foreach ($company->offers as $offer) {
                if ($offer->category && $offer->category->parent) {
                    $parentId = $offer->category->parent->id;
                    $childId = $offer->category->id;
                    
                    // Set parent category info
                    $displayCategories[$parentId]['name'] = $offer->category->parent->name;
                    
                    // Set child category info with count
                    $displayCategories[$parentId]['children'][$childId] = [
                        'id' => $childId,
                        'name' => $offer->category->name,
                        'count' => ($displayCategories[$parentId]['children'][$childId]['count'] ?? 0) + 1
                    ];
                }
            }
        }

        // Sort categories alphabetically
        uasort($displayCategories, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        if (count($displayCategories) > 0) {
            $this->activeCategory = array_key_first($displayCategories);
            $this->activeChildCategory = array_key_first($displayCategories[$this->activeCategory]['children']);
        }
        
        $this->categories = $displayCategories;
    }

    public function updateSearch()
    {
        $this->getCompanies();
    }

    public function setActiveCategory($id)
    {
        $this->activeCategory = $id;
    }
    
    public function setActiveChildCategory($id)
    {
        $this->activeChildCategory = $id;
        $this->getCompanies();
    }

    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.companies');
    }
}