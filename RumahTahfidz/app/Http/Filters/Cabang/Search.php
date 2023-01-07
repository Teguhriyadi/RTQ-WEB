<?php

namespace App\Http\Filters\Cabang;

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

        $query->where(function ($query) use ($jenjang) {
            $query->where('kode_halaqah', 'like', "%$jenjang%")
                ->orWhere('nama_halaqah', 'like', "%$jenjang%")
                ->orWhere('kode_rt', 'like', "%$jenjang%")
                ->orWhereHas('getLokasiRt', function ($query) use ($jenjang) {
                    $query->where('lokasi_rt', 'like', "%$jenjang%");
                });
        });

        return $next($query);
    }
}
