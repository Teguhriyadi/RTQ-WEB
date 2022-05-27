<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $data = [
            "data_dokumentasi" => Dokumentasi::get()
        ];

        return view("app.super_admin.galeri.v_index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("dokumentasi");
        }

        Dokumentasi::create([
            "judul" => $request->judul,
            "gambar" => $data
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }
}
