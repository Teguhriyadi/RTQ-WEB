<?php

namespace App\Http\Filters\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class WaliSantri
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('id_wali')) {
            return $next($query);
        }

        $query->where('id_wali', request('id_wali'));

        return $next($query);
    }
}
