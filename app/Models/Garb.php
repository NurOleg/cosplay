<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Garb extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'fandom_id',
        'executant_id',
        'thematic_id',
        'concretization',
        'concretization_eng',
        'description',
        'hero_id',
        'active'
    ];

    protected static function boot() {

        parent::boot();

        static::creating(function(self $garb) {
            $garb->code = uniqid();
        });
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function thematic(): BelongsTo
    {
        return $this->belongsTo(Thematic::class);
    }

    /**
     * @return BelongsTo
     */
    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class);
    }

    /**
     * @return BelongsTo
     */
    public function fandom(): BelongsTo
    {
        return $this->belongsTo(Fandom::class);
    }

    /**
     * @return MorphMany
     */
    public function images(): MorphMany
    {
        return $this
            ->morphMany(Image::class, 'imageable')
            ->orderBy('order');
    }

    /**
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
