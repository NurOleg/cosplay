<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'order', 'imageable_type', 'imageable_id'];

    protected static function boot() {

        parent::boot();

        static::deleting(function(Image $image) {
            Storage::disk('public')->delete($image->path);
      });
    }
}
