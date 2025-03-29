<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'type',
        'offer_code',
        'offer_link',
        'description',
        'quantity',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}
