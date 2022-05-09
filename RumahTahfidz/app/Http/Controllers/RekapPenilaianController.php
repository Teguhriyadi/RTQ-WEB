<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapPenilaianController extends Controller
{
    public function tadribat()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
            'jenjang' => Jenjang::all()
        ];

        return view('app.wali_santri.rekap_penilaian.tadribat.v_index', $data);
    }

    public function hafalan()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_penilaian.hafalan.v_index', $data);
    }

    public function imla()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_penilaian.imla.v_index', $data);
    }

    public function iman_adab()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_penilaian.iman_adab.v_index', $data);
    }

    public function mulok()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_penilaian.mulok.v_index', $data);
    }
}
