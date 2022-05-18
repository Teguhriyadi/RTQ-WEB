<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CobaController extends Controller
{
    public function coba_rekap()
    {
        return view("app.coba_rekap");
    }

    public function post_rekap(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();

        $counter = Iuran::selectRaw('year(created_at) as tahun')->distinct()->get();
        $data = [
            "data_coba" => Iuran::whereBetween("tanggal", [$tanggal_awal, $tanggal_akhir])->selectRaw('id_santri as santri_id')->distinct()->get()
        ];

        return view("app.coba_rekap", $data);
    }
}
