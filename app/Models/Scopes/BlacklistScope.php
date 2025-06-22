<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class BlacklistScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::check()) {
            // Skip scope if current route is in admin group
            if (request()->routeIs('admin.*')) {
                return;
            }
            
            $user = Auth::user();
            
            // If user has no company, skip blacklist filtering
            if (!$user->company_id) {
                return;
            }
            
            // Get the user's company
            $userCompany = Company::find($user->company_id);
            
            if (!$userCompany) {
                return;
            }
            
            // Get blacklisted company IDs
            $blacklistedCompanyIds = $userCompany->blacklistedCompanies()->pluck('companies.id')->toArray();
            
            // If no blacklisted companies, return
            if (empty($blacklistedCompanyIds)) {
                return;
            }
            
            // Exclude offers from blacklisted companies
            $builder->whereNotIn('company_id', $blacklistedCompanyIds);
        }
    }
}
