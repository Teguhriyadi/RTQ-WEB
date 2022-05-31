<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\TerakhirLogin;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        $role = Role::orderBy('id', 'DESC')->get();
        return view("app.auth.v_login", compact('role'));
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
                $hak_akses = HakAkses::where('id_role', $request->hak_akses)->where('id_user', $user->id)->first();
                if ($hak_akses) {
                    if (Auth::attempt($validasi)) {
                        User::where('id', Auth::user()->id)->update([
                            'id_hak_akses' => $hak_akses->id
                        ]);

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
