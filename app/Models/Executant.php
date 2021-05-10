<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Executant extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'email',
        'fullname',
        'phone',
        'password',
        'sex',
        'nickname',
        'country',
        'city',
        'description',
    ];

    /**
     * @return BelongsToMany
     */
    public function competences(): BelongsToMany
    {
        return $this->belongsToMany(Competence::class);
    }
}
