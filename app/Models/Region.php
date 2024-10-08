<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @mixin \Illuminate\Database\Query\Builder
 */
class Region extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'region_id');
    }
}
