<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = [
            "data_struktur_organisasi" => StrukturOrganisasi::get(),
            "data_jabatan" => Jabatan::get()
        ];

        return view("app.super_admin.halaman_utama.struktur_organisasi.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "deskripsi" => "required",
            "id_jabatan" => "required",
            "foto" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        if ($request->file("foto")) {
            $data = $request->file("foto")->store("struktur_organisasi");
        } else {
            $data = NULL;
        }

        StrukturOrganisasi::create([
            "nama" => $request->nama,
            "id_jabatan" => $request->id_jabatan,
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => StrukturOrganisasi::where("id", $request->id)->first(),
            "data_jabatan" => Jabatan::get()
        ];

        return view("app.super_admin.halaman_utama.struktur_organisasi.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "deskripsi" => "required",
            "id_jabatan" => "required",
            "foto" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        if ($request->file("gambar")) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }

            $data = $request->file("gambar")->store("struktur_organisasi");
        } else {
            $data = $request->foto_lama;
        }

        StrukturOrganisasi::where("id", $request->id)->update([
            "nama" => $request->nama,
            "id_jabatan" => $request->id_jabatan,
            "deskripsi" => $request->deskripsi,
            "foto" => $data
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy(Request $request, $id)
    {
        if ($request->foto) {
            Storage::delete($request->foto);
        }

        StrukturOrganisasi::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
