<?php

namespace App\Http\Filters\Jenjang;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Search
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('search')) {
            return $next($query);
        }

        $jenjang = request('search');
        $query->where('jenjang', 'like', "%$jenjang%");

        return $next($query);
    }
}
