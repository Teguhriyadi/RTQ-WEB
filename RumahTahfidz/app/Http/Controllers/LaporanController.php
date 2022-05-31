<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Asatidz;
use App\Models\KelasHalaqah;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporan_absensi_santri()
    {
        $halaqah = KelasHalaqah::where("id_asatidz", Auth::user()->id)->where("status", 1)->first();

        $data = [
            "data_santri" => Santri::where("kode_halaqah", $halaqah->kode_halaqah)->get()
        ];

        return view("app.administrator.laporan.absensi.v_santri", $data);
    }

    public function laporan_absensi_asatidz()
    {
        $data = [
            "data_asatidz" => Asatidz::paginate(10)
        ];

        return view("app.administrator.laporan.absensi.v_asatidz", $data);
    }
}
