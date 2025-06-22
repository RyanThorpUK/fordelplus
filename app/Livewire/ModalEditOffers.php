<?php

namespace App\Livewire;

use App\Models\Offer;
use App\Models\OfferCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use App\Livewire\Admin\AdminAllOffers;
use App\Models\Scopes\OfferTypeScope;

class ModalEditOffers extends ModalComponent
{
    use WithFileUploads;
   
    public $tab = 'discount-code';
    public $offerCategories;
    public $offer,
        $offerName,
        $offerImage,
        $offerStartDate,
        $offerEndDate,
        $offerUserType,
        $offerType,
        $offerCode,
        $offerLink,
        $offerEmail,
        $offerHighlight,
        $offerHighlightType = 'price',
        $offerFields,
        $offerDescription,
        $offerQuantity,
        $offerCategory;

    public $phoneField = false;
    public $messageField = false; 
    public $companyNameField = false;

    protected $rules = [
        'offerName' => 'required',
        'offerStartDate' => 'required|date',
        'offerEndDate' => 'required|date',
        'offerHighlight' => 'nullable',
        'offerHighlightType' => 'nullable',
        'offerUserType' => 'required',
        'offerType' => 'required',
        'offerLink' => 'required_if:offerType,discount-code',
        'offerEmail' => 'required_if:offerType,contact-form',
        'offerImage' => 'nullable',
        'offerDescription' => 'required',
        'offerCategory' => 'required',
    ];

    protected function rules()
    {
        $rules = $this->rules;
        
        // Only validate image if it's a new upload
        if (is_object($this->offerImage)) {
            $rules['offerImage'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:528';
        }
        
        return $rules;
    }

    public function render()
    {
        return view('livewire.modal-edit-offers');
    }

    public function mount( $offer_ulid = null )
    {
        $this->offerType = 'discount-code';
        // $this->offerCategories = OfferCategory::all();
        $this->offerCategories = OfferCategory::whereNull('parent_id')
        ->with('children')
        ->get();


        if ($offer_ulid) { 

            $this->offer = Offer::withoutGlobalScope(OfferTypeScope::class)->where('ulid', $offer_ulid)->first();

            if ($this->offer) {
                $this->offerName = $this->offer->name;
                $this->offerImage = $this->offer->image;
                $this->offerStartDate = $this->offer->start_date->format('Y-m-d');
                $this->offerEndDate = $this->offer->end_date->format('Y-m-d');
                $this->offerUserType = (int) $this->offer->user_type;
                $this->offerType = $this->offer->offer_type;
                $this->offerCode = $this->offer->offer_code;
                $this->offerLink = $this->offer->offer_link;
                $this->offerDescription = $this->offer->description;
                $this->offerHighlight = $this->offer->highlight;
                $this->offerHighlightType = $this->offer->highlight_type ?? 'price';
                $this->offerQuantity = $this->offer->quantity;
                $this->offerCategory = $this->offer->category_id;
                $this->offerEmail = $this->offer->offer_email;
                $this->offerFields = $this->offer->offer_fields;

                // Parse the JSON fields if they exist
                if ($this->offerFields) {
                    $this->phoneField = in_array('phone', $this->offerFields);
                    $this->messageField = in_array('message', $this->offerFields);
                    $this->companyNameField = in_array('company_name', $this->offerFields);
                }
            }

        }
    }

    public function selectOfferType($offerType)
    {
        $this->offerType = $offerType;
    }

    public function update()
    {
        $this->validate($this->rules());

        $data = [
            'name' => $this->offerName,
            'slug' => Str::slug($this->offerName),
            'start_date' => $this->offerStartDate,
            'end_date' => $this->offerEndDate,
            'type' => $this->offerType,
            'user_type' => (int) $this->offerUserType,
            'offer_type' => $this->offerType,
            'highlight' => $this->offerHighlight,
            'highlight_type' => $this->offerHighlightType,
            // 'offer_email' => $this->offerEmail,
            // 'offer_fields' => $this->offerFields,
            'offer_code' => $this->offerCode,
            'offer_link' => $this->offerLink,
            'description' => $this->offerDescription,
            'company_id' => auth()->user()->company_id,
            'category_id' => $this->offerCategory,
        ];

        // Add conditional fields based on offer type
        if ($this->offerType === 'contact-form') {
            $data['offer_email'] = $this->offerEmail;
            
            // Create JSON array of selected fields
            $fields = [];
            if ($this->phoneField) $fields[] = 'phone';
            if ($this->messageField) $fields[] = 'message';
            if ($this->companyNameField) $fields[] = 'company_name';
            
            $data['offer_fields'] = $fields;
        }

        
        if (is_object($this->offerImage)) {
            $data['image'] = $this->offerImage->store('offer-images', 'public');
        }
        
        if ($this->offer) {
            // Update existing offer
            $this->offer->update($data);
        } else {
            // Create new offer
            $this->offer = Offer::create($data);
        }

        // Dispatch to multiple listeners
        $this->dispatch('refresh')->to(AdminAllOffers::class);
        
        $this->closeModal();
    }

    public function deleteOffer()
    {
        $this->offer->delete();
        $this->dispatch('refresh')->to(AdminAllOffers::class);
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
}
