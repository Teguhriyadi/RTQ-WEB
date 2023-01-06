<?php

namespace App\Http\Filters\KategoriPelajaran;

class Penilaian
{
    public function handle($query, $next)
    {
        if (!request()->has('id_kategori_penilaian')) {
            return $next($query);
        }

        $query->where('id_kategori_penilaian', request('id_kategori_penilaian'));

        return $next($query);
    }
}
