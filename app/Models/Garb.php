<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Garb extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'fandom_id', 'thematic_id', 'hero_id', 'active'];

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
}
