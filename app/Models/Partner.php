<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'company_name',
        'company_address',
        'password',
        'status'
    ];

    protected $hidden = ['password'];
}

