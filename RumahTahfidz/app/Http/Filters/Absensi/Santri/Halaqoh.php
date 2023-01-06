<?php

namespace App\Http\Filters\Absensi\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Halaqoh
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('kode_halaqah')) {
            return $next($query);
        }

        $query->whereHas('getSantri', function ($query) {
            return $query->where('kode_halaqah', request('kode_halaqah'));
        });

        return $next($query);
    }
}
