<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapNilaiController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Santri::where("id_wali", Auth::user()->id)->get()
        ];

        return view("app.wali_santri.rekap_nilai.v_index", $data);
    }

    public function detail($id_santri)
    {
        $data = [
            "detail" => Santri::where("id", $id_santri)->first()
        ];

        $data2 = [
            "getNilaiId" => Nilai::where("id_santri", $id_santri)->get()
        ];

        $data3 = Nilai::where("id_santri", $id_santri)->get();

        foreach ($data3 as $id) {
            $id2 = $id->getKategoriPelajaran->getJenjang->id;
        }

        return view("app.wali_santri.rekap_nilai.v_detail", $data, $data2, $id2);
    }

    public function detail_nilai(Request $request, $id_santri)
    {
        $data = [
            "detail" => Santri::where("id", $id_santri)->first(),
            "getId" => $request->id_jenjang
        ];

        $data2 = [
            "getNilaiId" => Nilai::where("id_kategori_pelajaran", $request->coba)->get()
        ];

        return view("app.wali_santri.rekap_nilai.v_detail", $data, $data2);
    }
}
