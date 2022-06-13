<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $profil = TentangKami::select("id", "foto", "deskripsi")->first();

        return view("app.super_admin.halaman_utama.tentang_kami.v_index", compact('profil'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "foto" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "deskripsi" => "required"
        ]);

        if ($request->file("foto")) {
            $data = $request->file("foto")->store("tentang_kami");
        }

        TentangKami::create([
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "foto" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "deskripsi" => "required"
        ]);

        if ($request->file("foto")) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }

            $data = $request->file("foto")->store("tentang_kami");
        } else {
            $data = $request->foto_lama;
        }

        TentangKami::where("id", $id)->update([
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
