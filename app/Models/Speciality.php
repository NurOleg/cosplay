<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Speciality extends Model
{
    use HasFactory;

    /**
     * @return BelongsToMany
     */
    public function executants(): BelongsToMany
    {
        return $this->belongsToMany(Executant::class);
    }
}
