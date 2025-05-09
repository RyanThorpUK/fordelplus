<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Company;
use Livewire\WithFileUploads;

class AdminBusinessInfo extends Component
{
    use WithFileUploads;

    public $company;
    public $logo;
    public $description;
    public $name;
    public $cvr_number;
    public $billing_email;
    public $phone_number;
    public $website;

    protected $rules = [
        'logo' => 'nullable|image|max:1024',
        'description' => 'nullable|string',
        'name' => 'required|string|max:255',
        'cvr_number' => 'nullable|string|max:255',
        'billing_email' => 'nullable|email|max:255',
        'phone_number' => 'nullable|string|max:20',
        'website' => 'nullable|url|max:255',
    ];

    public function mount()
    {
        $this->company = Company::find(auth()->user()->company_id);
        $this->description = $this->company->description;
        $this->name = $this->company->name;
        $this->cvr_number = $this->company->cvr_number;
        $this->billing_email = $this->company->billing_email;
        $this->phone_number = $this->company->phone_number;
        $this->website = $this->company->website;
    }

    public function save()
    {
        $this->validate();

        if ($this->logo) {
            $path = $this->logo->store('logos', 'public');
            $this->company->logo = $path;
        }

        $this->company->update([
            'description' => $this->description,
            'name' => $this->name,
            'cvr_number' => $this->cvr_number,
            'billing_email' => $this->billing_email,
            'phone_number' => $this->phone_number,
            'website' => $this->website,
        ]);
        
        session()->flash('message', 'Company information updated successfully.');
    }

    #[Layout('components.layouts.app')] 
    public function render()
    {
        return view('livewire.admin.admin-business-info');
    }
}
