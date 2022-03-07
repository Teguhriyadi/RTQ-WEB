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
        $validasi = Validator::make($request->all(), [
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $validated = [
            'no_hp' => $request->no_hp,
            'password' => $request->password
        ];

        if (Auth::attempt($validated)) {
            TerakhirLogin::create([
                'nama' => Auth::user()->nama,
                'id_user' => Auth::user()->id
            ]);

            $request->session()->regenerate();

            return response()->json([
                'message' => 'Login Success',
                'status' => 1
            ], 200);
        } else {
            return response()->json([
                'message' => 'Login Failed!',
                'status' => 0
            ], 200);
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return response()->json([
            'message' => 'Logout Successful',
            'status' => true
        ]);
    }
}
