<?php

namespace App\Http\Filters\Absensi\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class InDay
{
    public function handle(Builder $query, Closure $next)
    {
        $query->whereDate;

        return $next($query);
    }
}
