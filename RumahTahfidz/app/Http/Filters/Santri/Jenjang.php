<?php

namespace App\Http\Filters\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Jenjang
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('id_jenjang')) {
            return $next($query);
        }

        $query->where('id_jenjang', request('id_jenjang'));

        return $next($query);
    }
}
