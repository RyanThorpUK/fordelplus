<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{

    protected $table = 'user_invitations';

    protected $fillable = [
        'email',
        'token',
        'type',
        'expires_at',
        'accepted_at',
        'company_id',
        'user_id'
    ];

    protected $casts = [
        'expires_at' => 'datetime'
    ];
} 