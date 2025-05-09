<?php

namespace App\Livewire;

use App\Models\Company as CompanyModel;
use Livewire\Component;
use Livewire\Attributes\Layout;

class Company extends Component
{
    public $company;
    public $offers;

    public function mount($company_ulid)
    {
        $this->company = CompanyModel::where('ulid', $company_ulid)->first();

        if ( !$this->company) {
            abort(404);
        }

        $this->offers = $this->company->offers()->where('start_date', '<=', now())->where('end_date', '>=', now())->get();
    }

    #[Layout('components.layouts.guest')] 
    public function render()
    {
        return view('livewire.company');
    }
}
