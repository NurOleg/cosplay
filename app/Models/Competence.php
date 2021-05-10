<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'created_at', 'updated_at'];

    /**
     * @return BelongsToMany
     */
    public function executants(): BelongsToMany
    {
        return $this->belongsToMany(Executant::class);
    }
}
