<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilUserController extends Controller
{
    public function index()
    {
        return view("app.administrator.profil_user.v_index");
    }

    public function simpan_gambar_profil(Request $request)
    {
        $user = User::where("id", $request->id)->first();

        if ($request->file("gambar"))
        {
            if ($request->oldGambarProfil)
            {
                Storage::delete($request->oldGambarProfil);
            }

            $user["gambar"] = $request->file("gambar")->store("admin_cabang");
        }

        User::where("id", $user->id)->update([
            "gambar" => $user["gambar"]
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Gambar Profil Berhasil di ubah!', 'success')</script>");
    }

    public function ganti_password(Request $request)
    {
        if ($request->password_baru != $request->konfirmasi_password) {
            return redirect()->back()->with("message", "<script>Swal.fire('Oops', 'Konfirmasi Password Tidak Sesuai', 'error')</script>");
        } else {
            User::where("id", $request->id)->update([
                "password" => bcrypt($request->password_baru)
            ]);

            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Password Berhasil di Ubah!', 'success')</script>");
        }
    }
}
