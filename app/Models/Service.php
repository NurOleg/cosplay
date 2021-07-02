<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function garbs(): BelongsToMany
    {
        return $this->belongsToMany(Garb::class);
    }
}
