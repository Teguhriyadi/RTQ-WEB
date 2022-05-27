<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\KategoriPelajaran;
use App\Models\KategoriPenilaian;
use App\Models\Nilai;
use App\Models\NilaiTadribat;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapPenilaianController extends Controller
{
    public function index($slug)
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
            'penilaian' => KategoriPenilaian::where('slug', $slug)->first()
        ];

        return view('app.wali_santri.rekap_penilaian.v_index', $data);
    }

    public function detail($slug, $id, $id_jenjang = null)
    {
        $data = [
            'jenjang' => Jenjang::all(),
            'penilaian' => KategoriPenilaian::where('slug', $slug)->first(),
            'santri' => Santri::find($id),
        ];

        if ($id_jenjang == '') {
        } else {
            $data['data_pelajaran'] = KategoriPelajaran::where('id_jenjang', $id_jenjang)->where('id_kategori_penilaian', $data['penilaian']->id)->get();
        }

        return view('app.wali_santri.rekap_penilaian.v_detail', $data);
    }
}
