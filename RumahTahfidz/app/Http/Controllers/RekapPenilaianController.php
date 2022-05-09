<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
<<<<<<< HEAD
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
=======
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
>>>>>>> d45e01d1e7332ac80d866e8429e3e940f032b2ff
    }
}
