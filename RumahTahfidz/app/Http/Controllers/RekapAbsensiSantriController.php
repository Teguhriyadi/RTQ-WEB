<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapAbsensiSantriController extends Controller
{
    public function index()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_absensi.v_index', $data);
    }
}
