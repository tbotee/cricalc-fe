<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class ProductStatistic extends Model
{
    protected $dates = ['created_at'];

    protected $protected = [
        'id'
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return '€' . number_format($this->average_price, 0, ',', '.');
    }
}
