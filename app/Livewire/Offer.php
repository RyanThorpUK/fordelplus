<?php

namespace App\Livewire;

use App\Models\Offer as ModelsOffer;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OfferFormSubmission;

class Offer extends Component
{
    public $offer;
    public $companyOffers;
    public $relatedOffers;
    public $breadcrumbs;
    public $isFavourited = false;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $formSubmitted = false;

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

    public function mount($offer_ulid)
    {
        $this->offer = ModelsOffer::where('ulid', $offer_ulid)->first();

        if ( !$this->offer) {
            abort(404);
        }

        $this->companyOffers = ModelsOffer::where('company_id', $this->offer->company_id)
        ->where('id', '!=', $this->offer->id)
        ->where('start_date', '<=', now())
        ->where('end_date', '>=', now())
        ->get();
        
        $this->relatedOffers = ModelsOffer::where('category_id', $this->offer->category_id)
        ->where('id', '!=', $this->offer->id)
        ->where('company_id', '!=', $this->offer->company_id)
        ->where('start_date', '<=', now())
        ->where('end_date', '>=', now())
        ->get();

        $this->breadcrumbs[] = ['name' => 'Markedsplads', 'url' => '/'];
        array_push($this->breadcrumbs, ...$this->offer->getCategoryList());

        // Check if offer is favorited by current user
        if (auth()->check()) {
            $this->isFavourited = auth()->user()->hasFavourited($this->offer);
        }
    }

    public function getTimeRemaining($date)
    {
        $now = now();
        $endDate = $date;
        
        // If the date is in the past, return "Expired"
        if ($now->greaterThan($endDate)) {
            return "Expired";
        }
        
        $diffInDays = $now->diffInDays($endDate, false);
        
        // Use ceiling for small values to ensure at least 1 day shows
        if ($diffInDays < 1) {
            return "1 day";
        }
        
        if ($diffInDays < 7) {
            return ceil($diffInDays) . ' Dag' . (ceil($diffInDays) > 1 ? 'e' : '');
        } 
        
        $diffInWeeks = ceil($diffInDays / 7);
        if ($diffInDays < 30) {
            return $diffInWeeks . ' Uge' . ($diffInWeeks > 1 ? 'r' : '');
        } 
        
        $diffInMonths = ceil($diffInDays / 30);
        return $diffInMonths . ' måned' . ($diffInMonths > 1 ? 'er' : '');
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login');
        }
        
        $user = auth()->user();
        
        if ($this->isFavourited) {
            // Remove from favorites
            $user->favourites()->where('offer_id', $this->offer->id)->delete();
            $this->isFavourited = false;
        } else {
            // Add to favorites
            $user->favourites()->create([
                'offer_id' => $this->offer->id
            ]);
            $this->isFavourited = true;
        }
    }

    public function submitForm()
    {
        $rules = [
            'email' => 'required|email',
        ];

        // Only require fields if they exist in offer_fields
        if (in_array('company_name', $this->offer->offer_fields ?? [])) {
            $rules['name'] = 'required|min:2';
        }
        if (in_array('phone', $this->offer->offer_fields ?? [])) {
            $rules['phone'] = 'required|min:8';
        }
        if (in_array('message', $this->offer->offer_fields ?? [])) {
            $rules['message'] = 'required|min:10';
        }

        $messages = [
            'name.required' => 'Dit navn er påkrævet',
            'email.required' => 'Din email er påkrævet',
            'email.email' => 'Indtast venligst en gyldig email',
            'phone.required' => 'Dit telefonnummer er påkrævet',
            'phone.min' => 'Telefonnummer skal være mindst 8 cifre',
            'message.required' => 'Besked er påkrævet',
            'message.min' => 'Beskeden skal være mindst 10 tegn'
        ];

        $this->validate($rules, $messages);

        if ($this->offer->offer_email) {
            Notification::route('mail', $this->offer->offer_email)
            ->notify(new OfferFormSubmission([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
                'offer' => $this->offer->name,
                'company' => $this->offer->company->name
            ]));
        }

        $this->formSubmitted = true;
        $this->reset(['name', 'email', 'phone', 'message']);
    }

    #[Layout('components.layouts.guest')]
    public function render()
    {
        return view('livewire.offer');
    }
}
