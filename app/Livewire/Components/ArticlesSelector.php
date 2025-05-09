<?php

namespace App\Livewire\Components;

use App\Models\Offer;
use Livewire\Component;
use App\Models\OfferCategory;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Validate;

class ArticlesSelector extends Component
{
    use WithPagination;

    public $title;
    public $offers;
    public $originalOffers;
    public $categories;
    public $activeCategory;
    public $activeChildCategory;
    public $perPage = 12;

    #[Validate('boolean')]
    public $parentFilters = true;

    #[Validate('boolean')]
    public $childFilters = true;


    // Add this property to track the page
    protected $paginationTheme = 'tailwind';
    private $currentPage = 1; // Add this to track the page

    public function mount($title = null, $offers = [])
    {
        $this->title = $title;
        $this->originalOffers = $offers;

        $this->offers = empty($this->originalOffers) ? $this->getOffers() : $this->originalOffers;
        $this->categories = $this->getCategories();

        if (count($this->categories) > 0) {
            $this->activeCategory = array_key_first($this->categories);
            $this->activeChildCategory = array_key_first($this->categories[$this->activeCategory]['children']);
        }
        
    }

    private function getCategories()
    {
        // Loop through all categories and nest them under their parent category
        $categories = OfferCategory::whereNull('parent_id')->get();
        foreach ($categories as $category) {
            $category->children = OfferCategory::where('parent_id', $category->id)->get();
        }

        // Loop through all offers and get the category. Keep count of how many offers there are for each category
        $displayCategories = [];
        foreach ($this->offers as $offer) {

            foreach ($categories as $category) {

                foreach ($category->children as $child) {
                    
                    if ($offer->category_id == $child->id) {
                        $displayCategories[$category->id]['name'] = $category->name;
                        $displayCategories[$category->id]['children'][$child->id] = array(
                            'id' => $child->id,
                            'name' => $child->name,
                            'count' => ($displayCategories[$category->id]['children'][$child->id]['count'] ?? 0) + 1
                        );
                    }
                }
            }
        }
        
        // Sort alphabetically
        uasort($displayCategories, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return $displayCategories;
    }

    private function getOffers($offers = [])
    {
        $cacheKey = $this->activeChildCategory 
            ? "offers_category_{$this->activeChildCategory}_page_{$this->currentPage}" 
            : "offers_all_page_{$this->currentPage}";

        if (count($offers) > 0) {
            return $offers;
        }

        // If active filter is set, get offers by category
        if ($this->activeChildCategory) {
            // return cache()->remember($cacheKey, now()->addHours(24), function() {
                return Offer::with('company')
                    ->where('category_id', $this->activeChildCategory)
                    ->where('start_date', '<=', now())
                    ->where('end_date', '>=', now())
                    ->get();
            // });
        }

        // Cache all offers if no category selected
        // return cache()->remember($cacheKey, now()->addHours(24), function() {
            return Offer::with('company')
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->get();
        // });
    }

    public function setActiveCategory($categoryId)
    {
        $this->activeCategory = $categoryId;
    }

    public function setActiveChildCategory($childCategoryId)
    {
        $this->activeChildCategory = $this->activeChildCategory == $childCategoryId ? null : $childCategoryId;
        $this->currentPage = 1; // Reset to page 1 when changing category
        $this->resetPage();
    }

    public function updatedPage($page)
    {
        $this->currentPage = $page;
    }

    public function render()
    {
        
        $collection = empty($this->originalOffers) ? $this->getOffers() : $this->originalOffers;
        
        $paginatedOffers = new LengthAwarePaginator(
            $collection->forPage($this->currentPage, $this->perPage),
            $collection->count(),
            $this->perPage,
            $this->currentPage,
            [
                'path' => request()->url(),
                'pageName' => 'page',
            ]
        );
        
        return view('livewire.components.articles-selector', [
            'paginatedOffers' => $paginatedOffers
        ]);
    }
}
