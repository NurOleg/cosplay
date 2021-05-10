<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'slug';

    public $incrementing = false;

    protected $fillable = [
        'slug',
        'active',
        'name',
        'body',
        'preview_img_src',
        'preview_body',
        'created_at',
        'updated_at',
    ];
}
