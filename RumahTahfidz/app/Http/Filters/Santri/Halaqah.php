<?php

namespace App\Http\Filters\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Halaqah
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('kode_halaqah')) {
            return $next($query);
        }

        $query->where('kode_halaqah', request('kode_halaqah'));

        return $next($query);
    }
}
