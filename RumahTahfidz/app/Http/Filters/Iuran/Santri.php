<?php

namespace App\Http\Filters\Iuran;

class Santri
{
    public function handle($query, $next)
    {
        if (!request()->has('id_santri')) {
            return $next($query);
        }

        $query->where('id_santri', request('id_santri'));

        return $next($query);
    }
}
