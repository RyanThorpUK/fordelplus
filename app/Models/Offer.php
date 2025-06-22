<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Scopes\OfferTypeScope;
use App\Models\Scopes\BlacklistScope;
use App\Models\Concerns\HasUlid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
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
        'image',
        'highlight',
        'highlight_type'
    ];

    protected $casts = [
        'offer_fields' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new OfferTypeScope);
        static::addGlobalScope(new BlacklistScope);
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

    public function shortDescription($limit = 100)
    {
        return Str::limit($this->description, $limit);
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



    // public function scopeWithUserType($query, $user = null)
    // {
    //     // Get the current user if not provided
    //     if (!$user) {
    //         $user = request()->user();
    //     }
        
    //     // If no user, return query as-is (show all)
    //     if (!$user || !$user->type) {
    //         return $query;
    //     }
        
    //     // Filter offers for the user's current type
    //     return $query->where('user_type', $user->type);
    // }

    // public function scopeActive($query)
    // {
    //     return $query->where('start_date', '<=', now())
    //         ->where('end_date', '>=', now());
    // }

    // public function scopeForCategory($query, $categoryId)
    // {
    //     if (!$categoryId) {
    //         return $query;
    //     }
        
    //     return $query->where('category_id', $categoryId);
    // }
}
