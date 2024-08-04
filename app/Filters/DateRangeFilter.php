<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class DateRangeFilter
{
    public static function apply(Builder $query, $values)
    {
        [$start, $end] = $values;
        return $query->whereBetween('trip_date', [$start, $end]);
    }
}
