<?php

namespace App\Http\Controllers;

use App\Models\ProfilWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilWebController extends Controller
{
    public function index()
    {
        $profil = ProfilWeb::select("id", "nama", "singkatan", "email", "no_hp", "alamat", "logo")->first();

        return view("app.super_admin.settings.profil_web.v_index", compact('profil'));
    }

    public function store(Request $request)
    {
        if ($request->file("logo")) {
            $data = $request->file("logo")->store("logo");
        } else {
            $data = NULL;
        }

        $profil = new ProfilWeb;

        $profil->nama = $request->nama;
        $profil->singkatan = $request->singkatan;
        $profil->no_hp = $request->no_hp;
        $profil->email = $request->email;
        $profil->alamat = $request->alamat;
        $profil->logo = $data;

        $profil->save();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function update(Request $request, $id)
    {
        $data = "";
        if ($request->file("logo")) {
            if ($request->logo_lama) {
                Storage::delete($request->logo_lama);
            }

            $data = $request->file("logo")->store("logo");
        }

        ProfilWeb::where("id", $id)->update([
            "nama" => $request->nama,
            "singkatan" => $request->singkatan,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "logo" => $data
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
