<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OfferTypeScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::check()) {
            // Skip scope if current route is in admin group
            if (request()->routeIs('admin.*')) {
                return;
            }
            
            $userType = Auth::user()->type;
            
            $builder->where(function($query) use ($userType) {
                $query->where('user_type', $userType);
            });
        }
    }
} 