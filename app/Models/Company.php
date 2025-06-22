<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use App\Models\UserInvitation;
use App\Models\Concerns\HasUlid;

class Company extends Model
{
    use HasFactory, HasUlid;
    protected $fillable = [
        'name',
        'logo',
        'description',
        'cvr_number',
        'billing_email',
        'phone_number',
        'website',
        'white_label_enabled',
        'theme',
    ];

    protected $casts = [
        'white_label_enabled' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function managers()
    {
        return $this->hasMany(User::class)->where('role', 'manager');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function activeOffers()
    {
        return $this->hasMany(Offer::class)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now());
    }

    public function userInviteToken()
    {
        return $this->hasOne(UserInvitation::class)->where('type', 'company');
    }

    public function blacklistedCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_blacklist', 'company_id', 'blacklisted_company_id')
            ->withTimestamps();
    }

    public function blacklistedByCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_blacklist', 'blacklisted_company_id', 'company_id')
            ->withTimestamps();
    }

    protected static function booted()
    {
        static::created(function ($company) {
            UserInvitation::create([
                'type' => 'company',
                'email' => $company->billing_email ?? 'company-' . $company->id . '@example.com',
                'token' => Str::random(40),
                'expires_at' => now()->addDays(7),
                'company_id' => $company->id,
                'user_id' => auth()->id() ?? 1, // fallback to user 1 if not authenticated
            ]);
        });
    }
} 