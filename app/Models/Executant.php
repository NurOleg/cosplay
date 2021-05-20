<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
        'nickname_eng',
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

    /**
     * @return MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return HasMany
     */
    public function garbs(): HasMany
    {
        return $this->hasMany(Garb::class);
    }
}
