<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\TerakhirLogin;

class LoginController extends Controller
{
    public function login()
    {
        return view("app.auth.v_login");
    }

    public function loginProses(Request $request)
    {
        $validasi = $request->validate([
            'no_hp' => 'required',
            'password' => 'required'
        ]);

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
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('app/login');
    }
}
