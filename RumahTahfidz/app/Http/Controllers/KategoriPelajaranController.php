<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\KategoriPelajaran;
use App\Models\KategoriPenilaian;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class KategoriPelajaranController extends Controller
{
    public function index()
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_pelajaran" => Pelajaran::get(),
            "data_kategori_penilaian" => KategoriPenilaian::get(),
            "data_kategori" => KategoriPelajaran::get()
        ];

        return view("app.super_admin.settings.kategori.pelajaran.v_index", $data);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "id_kategori_penilaian" => "required",
            "id_jenjang" => "required",
            "id_pelajaran" => "required",
        ]);

        KategoriPelajaran::create($request->all());

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_pelajaran" => Pelajaran::get(),
            "data_kategori_penilaian" => KategoriPenilaian::get(),
            "edit" => KategoriPelajaran::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.kategori.pelajaran.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "id_kategori_penilaian" => "required",
            "id_jenjang" => "required",
            "id_pelajaran" => "required",
        ]);

        KategoriPelajaran::where("id", decrypt($request->id))->update([
            "id_jenjang" => $request->id_jenjang,
            "id_pelajaran" => $request->id_pelajaran,
            "id_kategori_penilaian" => $request->id_kategori_penilaian
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        KategoriPelajaran::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
