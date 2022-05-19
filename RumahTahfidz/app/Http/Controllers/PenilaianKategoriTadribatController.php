<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\KategoriPelajaranTadribat;
use App\Models\LokasiRt;
use App\Models\NilaiTadribat;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianKategoriTadribatController extends Controller
{
    public function index()
    {
        $data = [
            "data_cabang" => LokasiRt::all(),
            "data_jenjang" => Jenjang::all(),
        ];

        return view("app.asatidz.penilaian_per_kategori.v_index", $data);
    }

    public function create(Request $request)
    {
        $id_jenjang = Santri::where("id", $request->id)->first();

        $data = [
            "edit" => Santri::where("id", $request->id)->first(),
            "kategori_pelajaran_tadribat" => KategoriPelajaranTadribat::where("id_jenjang", $id_jenjang->id_jenjang)->get()
        ];

        return view("app.asatidz.penilaian_per_kategori.tadribat.v_tambah", $data);
    }

    public function store(Request $request)
    {
        foreach ($request->id_pelajaran_tadribat as $data => $value) {
            NilaiTadribat::create([
                "id_asatidz" => Auth::user()->id,
                "id_santri" => $request->id_santri[0],
                "id_pelajaran_tadribat" => $request->id_pelajaran_tadribat[$data],
                "nilai" => $request->nilai[$data]
            ]);
        }

        return redirect()->back();
    }
}
