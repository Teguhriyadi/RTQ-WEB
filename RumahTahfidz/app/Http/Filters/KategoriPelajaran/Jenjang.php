<?php

namespace App\Http\Filters\KategoriPelajaran;

class Jenjang
{
    public function handle($query, $next)
    {
        if (!request()->has('id_jenjang')) {
            return $next($query);
        }

        $query->where('id_jenjang', request('id_jenjang'));

        return $next($query);
    }
}
