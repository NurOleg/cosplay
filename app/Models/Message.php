<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'executant_id',
        'customer_id',
        'chat_id',
        'message'
    ];

    /**
     * @return BelongsTo
     */
    public function executant(): BelongsTo
    {
        return $this->belongsTo(Executant::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
