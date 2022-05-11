<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapIuranController extends Controller
{
    public function index()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_iuran.v_index', $data);
    }

    public function detail($id)
    {
        $data = [
            'santri' => Iuran::where('id_santri', $id)->get()
        ];

        return view('app.wali_santri.rekap_iuran.v_detail', $data);
    }
}
