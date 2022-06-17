<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilUserController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::where('id', Auth::user()->id)->first()
        ];

        return view("app.public.profil.user.v_index", $data);
    }

    public function simpan_gambar_profil(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::where("id", $request->id)->first();

        if ($request->file("gambar")) {
            if ($request->oldGambarProfil) {
                Storage::delete($request->oldGambarProfil);
            }

            $user["gambar"] = $request->file("gambar")->store("users");
        }

        User::where("id", $user->id)->update([
            "gambar" => url('/storage') . '/' . $user["gambar"]
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Gambar Profil Berhasil di ubah!', 'success')</script>");
    }

    public function ganti_password(Request $request)
    {
        $this->validate($request, [
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => 'required|same:password_baru'
        ]);

        $user = User::findOrFail($request->id);
        if (password_verify($request->password_lama, $user->password)) {
            if ($request->password_baru != $request->konfirmasi_password) {
                return redirect()->back()->with("message", "<script>Swal.fire('Oops', 'Konfirmasi Password Tidak Sesuai', 'error')</script>");
            } else {
                User::where("id", $request->id)->update([
                    "password" => bcrypt($request->password_baru)
                ]);

                return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Password Berhasil di Ubah!', 'success')</script>");
            }
        } else {
            return redirect()->back()->with("message", "<script>Swal.fire('Ooops', 'Password Gagal di Ubah!', 'error')</script>");
        }
    }
}
