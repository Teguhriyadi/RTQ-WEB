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

        return view("app.super_admin.struktur_organisasi.v_index", $data);
    }

    public function store(Request $request)
    {
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

        return view("app.super_admin.struktur_organisasi.v_edit", $data);
    }

    public function update(Request $request)
    {
        $data = "";
        if ($request->file("gambar")) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }

            $data = $request->file("gambar")->store("struktur_organisasi");
        }

        StrukturOrganisasi::where("id", $request->id)->update([
            "nama" => $request->nama,
            "id_jabatan" => $request->id_jabatan,
            "deskripsi" => $request->deskripsi,
            "foto" => $data
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
