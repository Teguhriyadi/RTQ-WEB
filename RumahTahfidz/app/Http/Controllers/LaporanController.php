<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Asatidz;
use App\Models\Santri;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan_absensi_santri()
    {
        $data = [
            "data_santri" => Santri::paginate(10)
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
