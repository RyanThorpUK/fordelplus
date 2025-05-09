<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Scopes\OfferTypeScope;
use App\Models\Concerns\HasUlid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory, HasUlid, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'user_type',
        'offer_type',
        'offer_code',
        'offer_link',
        'offer_email',
        'offer_fields',
        'description',
        'quantity',
        'company_id',
        'category_id',
        'image'
    ];

    protected $casts = [
        'offer_fields' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new OfferTypeScope);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(OfferCategory::class);
    }

    public function getCategoryList()
    {
        $category = $this->category;
        $parentCategory = OfferCategory::find($category->parent_id);

        $list = [
            [
                'name' => $parentCategory->name,
            ],
            [
                'name' => $category->name,
            ]
        ];

        return $list;
    }
}
