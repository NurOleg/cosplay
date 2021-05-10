<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'phone',
        'password',
        'organization',
        'country',
        'city',
        'description'
    ];
}
