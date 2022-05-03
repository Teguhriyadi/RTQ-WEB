<?php

namespace App\Http\Controllers;

use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\PenilaianTadribat;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianTadribatController extends Controller
{
    public function index()
    {
        $data = [
            "data_penilaian_tadribat" => PenilaianTadribat::get()
        ];

        return view("app.asatidz.penilaian.tadribat.v_index", $data);
    }

    public function create()
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_halaqah" => Halaqah::get()
        ];

        return view("app.asatidz.penilaian.tadribat.v_tambah", $data);
    }

    public function input(Request $request)
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_halaqah" => Halaqah::get(),
            "edit_jenjang" => Jenjang::where("id", $request->id_jenjang)->first(),
            "edit_halaqah" => Halaqah::where("kode_halaqah", $request->kode_halaqah)->first(),
            "data_santri" => Santri::where("id_jenjang", $request->id_jenjang)->where("kode_halaqah", $request->kode_halaqah)->get()
        ];

        return view("app.asatidz.penilaian.tadribat.v_tambah", $data);
    }

    public function store(Request $request)
    {
        foreach($request->id_santri as $data => $value) {
            PenilaianTadribat::create([
                "halaman" => $request->halaman[$data],
                "bagian" => $request->bagian[$data],
                "nilai" => $request->nilai[$data],
                "keterangan" => $request->keterangan[$data],
                "id_santri" => $request->id_santri[$data],
                "id_asatidz" => Auth::user()->id
            ]);
        }

        return redirect("app/sistem/nilai/tadribat");
    }
}
