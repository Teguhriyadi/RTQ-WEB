<?php

namespace App\Http\Controllers;

use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;

class KategoriPenilaianController extends Controller
{
    public function index()
    {
        $data = [
            "data_penilaian" => KategoriPenilaian::get()
        ];

        return view("app.super_admin.settings.kategori.penilaian.v_index", $data);
    }

    public function store(Request $request)
    {
        KategoriPenilaian::create($request->all());

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => KategoriPenilaian::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.kategori.penilaian.v_edit", $data);
    }

    public function update(Request $request)
    {
        KategoriPenilaian::where("id", $request->id)->update([
            "kategori_penilaian" => $request->kategori_penilaian
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        KategoriPenilaian::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
