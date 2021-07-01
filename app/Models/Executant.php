<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'city_id',
        'description',
        'twitter',
        'instagram',
        'facebook',
        'youtube',
        'vk',
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

    /**
     * @return HasMany
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return BelongsToMany
     */
    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class);
    }
}
