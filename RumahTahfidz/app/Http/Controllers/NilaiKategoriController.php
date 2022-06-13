<?php

namespace App\Http\Controllers;

use App\Models\NilaiKategori;
use Illuminate\Http\Request;

class NilaiKategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_nilai_kategori" => NilaiKategori::get()
        ];

        return view("app.super_admin.settings.nilai.kategori.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nilai_awal" => "required",
            "nilai_akhir" => "required",
            "nilai_kategori" => "required",
        ]);

        NilaiKategori::create($request->all());

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => NilaiKategori::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.nilai.kategori.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nilai_awal" => "required",
            "nilai_akhir" => "required",
            "nilai_kategori" => "required",
        ]);

        NilaiKategori::where("id", $request->id)->update([
            "nilai_awal" => $request->nilai_awal,
            "nilai_akhir" => $request->nilai_akhir,
            "nilai_kategori" => $request->nilai_kategori
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        NilaiKategori::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
