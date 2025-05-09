<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OfferTypeScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->check() && auth()->user()->hasRole('user')) {
            $userType = auth()->user()->type; // assuming 'type' is your field
            $builder->where(function($query) use ($userType) {
                if ($userType === 'b2b') {
                    $query->where('user_type', 'b2b');
                } else if ($userType === 'b2c') {
                    $query->where('user_type', 'b2c');
                }
            });
        }
    }
} 