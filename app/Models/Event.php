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
        'preview_body',
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

    public const MONTHS_FOR_FILTER = [
        1  => 'Январь',
        2  => 'Февраль',
        3  => 'Март',
        4  => 'Апрель',
        5  => 'Май',
        6  => 'Июнь',
        7  => 'Июль',
        8  => 'Август',
        9  => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь',
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
            $daysInterval = $startDate->day === $endDate->day ? $startDate->day : $startDate->day . '-' . $endDate->day;
            $resString = $daysInterval . ' ' . self::MONTHS[$startDate->month];
        } else {
            $resString = $startDate->day . ' ' . self::MONTHS[$startDate->month] . '-' . $endDate->day . ' ' . self::MONTHS[$endDate->month];
        }

        return $resString;
    }

    /**
     * @return string
     */
    public function getFullDateIntervalAttribute(): string
    {
        Carbon::setLocale('ru');
        $startDate = Carbon::parse($this->start);
        $endDate = Carbon::parse($this->end);

        if ($startDate->month === $endDate->month) {
            $daysInterval = $startDate->day === $endDate->day ? $startDate->day : $startDate->day . '-' . $endDate->day;
            $resString = $daysInterval . ' ' . self::MONTHS[$startDate->month] . ' ' . $startDate->year;
        } else {
            $resString = $startDate->day . ' ' . self::MONTHS[$startDate->month] . ' ' . $startDate->year . '-' . $endDate->day . ' ' . self::MONTHS[$endDate->month] . ' ' . $endDate->year;
        }

        return $resString;
    }
}
