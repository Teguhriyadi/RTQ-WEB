<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ValidasiIuranController extends Controller
{
    public function v_belum_lunas()
    {
        $data = [
            "santri" => Santri::get(),
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.belum_lunas.v_belum_lunas", $data, compact("count"));
    }

    public function v_rekap_belum_lunas_by(Request $request)
    {
        $data = [
            "select_rekap" => $request->rekap_by,
            "santri" => Santri::get(),
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.belum_lunas.v_belum_lunas", $data, compact("count"));
    }

    public function v_cari_rekap_belum_lunas(Request $request)
    {

        if ($request->mulai_tanggal) {
            $filter["tanggal"] = Carbon::parse($request->mulai_tanggal)->toDateString();
        } else {
            $filter["tanggal_awal"] = Carbon::parse($request->tanggal_awal)->toDateString();
            $filter["tanggal_akhir"] = Carbon::parse($request->tanggal_akhir)->toDateString();
        }
        $data = [
            "select_rekap" => $request->rekap_by,
            "santri" => Santri::get(),
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.belum_lunas.v_belum_lunas", $data, $filter, compact("count"));
    }

    public function v_lunas()
    {
        $data = [
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.lunas.v_lunas", $data, compact("count"));
    }
}
