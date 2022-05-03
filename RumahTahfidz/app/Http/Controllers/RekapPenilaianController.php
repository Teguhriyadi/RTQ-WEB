<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\KategoriPelajaranTadribat;
use App\Models\NilaiTadribat;
use App\Models\Santri;
use Illuminate\Http\Request;

class RekapPenilaianController extends Controller
{
    public function rekap()
    {
        $data = [
            "data_santri" => Santri::get()
        ];

        return view("app.asatidz.rekap.nilai.v_nilai", $data);
    }

    public function print($id)
    {
        $id_santri = Santri::where("id", $id)->first();

        $data = [
            "data_tadribat" => NilaiTadribat::where("id_santri", $id)->get(),
            "data_santri" => Santri::where("id", $id)->first(),
            "data_pelajaran" => KategoriPelajaranTadribat::where("id_jenjang", $id_santri->id_jenjang)->get()
        ];

        return view("app.asatidz.rekap.nilai.v_print", $data);
    }
}
