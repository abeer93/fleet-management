<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class DateFilter
{
    public static function apply(Builder $query, $value)
    {
        return $query->whereDate('trip_date', $value);
    }
}
