<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInvitation extends Model
{

    protected $fillable = [
        'type',
        'email',
        'token',
        'expires_at',
        'accepted_at',
        'company_id',
        'user_id',
    ];
}
