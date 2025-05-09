<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Concerns\HasUlid;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable, HasUlid, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'type',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

    public function companies()
    {
        return $this->belongsToMany(\App\Models\Company::class);
    }

    // Role checking methods
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isManager()
    {
        return $this->hasRole('manager');
    }

    public function isUser()
    {
        return !$this->hasRole('admin') && !$this->hasRole('manager');
    }

    // Permission methods
    public function canEditCompany(Company $company)
    {
        return $this->hasRole('admin') || 
            ($this->hasRole('manager') && $this->current_company_id === $company->id);
    }

    public function canViewCompany(Company $company)
    {
        return $this->hasRole('admin') || 
            $this->current_company_id === $company->id;
    }

    public function canManageUsers()
    {
        return $this->hasRole('admin') || $this->hasRole('manager');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function favouriteOffers()
    {
        return $this->belongsToMany(Offer::class, 'favourites');
    }

    public function hasFavourited(Offer $offer)
    {
        return $this->favourites()->where('offer_id', $offer->id)->exists();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmail);
    }
}