<?php

namespace App\Http\Filters\Nilai;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Santri
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('id_santri')) {
            return $next($query);
        }

        $query->where('id_santri', request('id_santri'));

        return $next($query);
    }
}
