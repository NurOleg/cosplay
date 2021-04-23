<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['name_ru', 'name_eng', 'code', 'active'];
}
