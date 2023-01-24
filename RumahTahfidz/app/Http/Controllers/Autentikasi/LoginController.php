<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\ProfilWeb;
use App\Models\Role;
use App\Models\TerakhirLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $role = Role::orderBy('id', 'DESC')->get();
        $profil = ProfilWeb::first();

        return view("app.auth.v_login", compact('role', 'profil'));
    }

    public function hakAkses(Request $request)
    {
        $request->validate([
            'id_hak_akses' => 'required',
        ]);

        $cek = User::where('id', Auth::user()->id)->update([
            'id_hak_akses' => $request->id_hak_akses,
        ]);

        if ($cek) {
            return back();
        } else {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'Maaf anda belum mendapatkan akses, harap hubungi Admin Pusat!', 'error');</script>")->withInput();
        }
    }

    public function changeHakAkses(Request $request, $id)
    {
        $cek = User::where('id', Auth::user()->id)->update([
            'id_hak_akses' => $id,
        ]);

        if ($cek) {

            echo 1;
        } else {
            echo 2;
        }
    }

    public function loginProses(Request $request)
    {
        $validasi = $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('no_hp', $request->no_hp)->first();

        if ($user) {
            if ($user->status == 1) {
                if (Auth::attempt($validasi)) {

                    TerakhirLogin::create([
                        'nama' => Auth::user()->nama,
                        'id_user' => Auth::user()->id
                    ]);

                    $request->session()->regenerate();

                    return redirect()->intended('app/sistem/home');
                } else {
                    return back()->with('message', "<script>Swal.fire('Ooops!', 'No telepon dan password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
                }
            } else {
                return back()->with('message', "<script>Swal.fire('Ooops!', 'Maaf anda belum mendapatkan akses, harap hubungi Admin Pusat!', 'error');</script>")->withInput();
            }
        } else {
            return back()->with('message', "<script>Swal.fire('Ooops!', 'No telepon dan password tidak cocok, harap periksa kembali!', 'error');</script>")->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('app/login');
    }
}
