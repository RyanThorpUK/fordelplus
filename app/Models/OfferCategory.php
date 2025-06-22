<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\HasUlid;

class OfferCategory extends Model
{
    use HasFactory, HasUlid;

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    protected $with = ['parent'];
    
    public function parent()
    {
        return $this->belongsTo(OfferCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(OfferCategory::class, 'parent_id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'category_id');
    }
} 