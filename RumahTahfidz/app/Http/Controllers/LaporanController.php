<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan_absensi()
    {
        return view("app.administrator.laporan.absensi.v_santri");
    }
}
