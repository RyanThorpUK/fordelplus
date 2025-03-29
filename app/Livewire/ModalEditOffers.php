<?php

namespace App\Livewire;

use App\Models\Offer;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class ModalEditOffers extends ModalComponent
{
    use WithFileUploads;
   
    public $tab = 'discount-code';

    public $offer,
        $offerName,
        $offerImage,
        $offerStartDate,
        $offerEndDate,
        $offerType,
        $offerCode,
        $offerLink,
        $offerDescription,
        $offerQuantity;

    protected $rules = [
        'offerName' => 'required',
        'offerStartDate' => 'required|date',
        'offerEndDate' => 'required|date',
        'offerType' => 'required',
        'offerCode' => 'required',
        'offerLink' => 'required',
        'offerDescription' => 'required',
        // 'offerQuantity' => 'required',
    ];

    public function render()
    {
        return view('livewire.modal-edit-offers');
    }

    public function mount( $offer_id = null )
    {
        $this->tab = 'discount-code';
        if ($offer_id) { 

            $this->offer = Offer::find($offer_id);

            if ($this->offer) {
                $this->offerName = $this->offer->name;
                $this->offerStartDate = $this->offer->start_date;
                $this->offerEndDate = $this->offer->end_date;
                $this->offerType = $this->offer->type;
                $this->offerCode = $this->offer->code;
                $this->offerLink = $this->offer->link;
                $this->offerDescription = $this->offer->description;
                $this->offerQuantity = $this->offer->quantity;
            }
        }
    }

    public function selectTab($tab)
    {
        $this->tab = $tab;
    }

    public function update()
    {
        $validated = $this->validate();

        
        // $offer = Offer::find($this->offer->id);

        // Create or update offer
        // if ($this->offer) {
        //     $offer = Offer::find($this->offer->id);
        // } else {
        //     $offer = new Offer();
        // }

        $this->offer = new Offer();
        $this->offer->fill([
            'name' => $this->offerName,
            'slug' => Str::slug($this->offerName),
            'start_date' => $this->offerStartDate,
            'end_date' => $this->offerEndDate,
            'type' => $this->offerType,
            'offer_code' => $this->offerCode,
            'offer_link' => $this->offerLink,
            'description' => $this->offerDescription,
        ]);

        if ($this->offerImage) {
            $this->offer->image = $this->offerImage->store('offer-images', 'public');
        }

        $this->offer->save();

        $this->dispatch('refresh')->to(AllOffers::class);
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
