<?php

namespace App\Http\Filters\Absensi\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Jenjang
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('id_jenjang')) {
            return $next($query);
        }

        $query->whereHas('getSantri', function ($query) {
            return $query->where('id_jenjang', request('id_jenjang'));
        });

        return $next($query);
    }
}
