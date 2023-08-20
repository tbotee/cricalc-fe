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
}
