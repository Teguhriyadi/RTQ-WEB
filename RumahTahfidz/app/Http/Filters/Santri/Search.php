<?php

namespace App\Http\Filters\Santri;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class Search
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('search')) {
            return $next($query);
        }

        $query->when($santri = request('search'), function ($query) use ($santri) {
            $query->where(function ($query) use ($santri) {
                $query->where('nis', 'like', "%$santri%")
                    ->orWhere('nama_lengkap', 'like', "%$santri%");
            });
        });

        return $next($query);
    }
}
