<?php

namespace App\Http\Filters\Absensi\Santri;

use App\Models\Santri;
use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Builder;

class InDay
{
    public function handle(Builder $query, Closure $next)
    {
        if (!request()->has('id_jenjang') || !request()->has('kode_halaqah')) {
            return $next($query);
        }

        $date = Carbon::now();

        $santri = Santri::where("id_jenjang", request('id_jenjang'))
            ->where("kode_halaqah", request('kode_halaqah'))
            ->get();

        foreach ($santri as $s) {
            $query->whereDate("created_at", $date)->where('id_santri', $s->id);
        }

        return $next($query);
    }
}
