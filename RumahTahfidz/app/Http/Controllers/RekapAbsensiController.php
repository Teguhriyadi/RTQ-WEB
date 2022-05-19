<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAsatidz;
use Illuminate\Http\Request;

class RekapAbsensiController extends Controller
{
    public function rekapAsatidz($id)
    {
        $data = [
            'asatidz' => AbsensiAsatidz::where('id_asatidz', $id)->latest()->get()
        ];

        return view('app.asatidz.rekap.absensi.v_index', $data);
    }
}
