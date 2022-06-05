<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\Quran;
use Illuminate\Http\Request;

class HafalanAsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_index", $data);
    }

    public function store(Request $request)
    {
        Quran::create([
            "id_asatidz" => $request->id,
            "quran_awal" => $request->quran_awal,
            "quran_akhir" => $request->quran_akhir,
            "keterangan" => "Berhasil"
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function show($id)
    {
        $data = [
            "detail" => Asatidz::where("id", $id)->first(),
            "data_hafalan_asatidz" => Quran::where("id_asatidz", $id)->get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_detail", $data);
    }
}
