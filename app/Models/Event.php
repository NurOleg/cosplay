<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'name',
        'place_title',
        'address',
        'body',
        'image_src',
        'active',
        'start',
        'end',
        'point',
        'programm'
    ];

    public const MONTHS = [
        1  => 'Января',
        2  => 'Февраля',
        3  => 'Марта',
        4  => 'Апреля',
        5  => 'Мая',
        6  => 'Июня',
        7  => 'Июля',
        8  => 'Августа',
        9  => 'Сентября',
        10 => 'Октября',
        11 => 'Ноября',
        12 => 'Декабря',
    ];

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
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return string
     */
    public function getDateIntervalAttribute(): string
    {
        Carbon::setLocale('ru');
        $startDate = Carbon::parse($this->start);
        $endDate = Carbon::parse($this->end);

        if ($startDate->month === $endDate->month) {
            $resString = $startDate->day . '-' . $endDate->day . ' ' . self::MONTHS[$startDate->month];
        } else {
            $resString = $startDate->day . ' ' . self::MONTHS[$startDate->month] . '-' . $endDate->day . ' ' . self::MONTHS[$endDate->month];
        }

        return $resString;
    }
}
