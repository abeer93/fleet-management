<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterHandler
{
    protected $filters = [
        'date' => DateFilter::class,
        'date_range' => DateRangeFilter::class,
    ];

    public function apply(Request $request, Builder $query)
    {
        foreach ($this->filters as $key => $filter) {
            if ($request->has($key)) {
                $query = $filter::apply($query, $request->input($key));
            }
        }

        return $query;
    }
}
