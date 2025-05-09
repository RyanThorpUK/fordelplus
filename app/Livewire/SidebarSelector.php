<?php

namespace App\Livewire;

use Livewire\Component;

class SidebarSelector extends Component
{
    public function render()
    {
        return view('livewire.sidebar-selector');
    }

    public function selectCompany($companyId)
    {
        $company = \App\Models\Company::find($companyId);
        $user = auth()->user();

        // Check if the company exists and the user is associated with it
        if ($company && $user->companies->contains($company)) {
            $user->company_id = $company->id;
            $user->save();
        }

        // Refresh browser
        $this->dispatch('refresh-browser');
    }
}
