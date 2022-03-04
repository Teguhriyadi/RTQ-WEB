<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
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

            $user = User::where('no_hp', $request->no_hp)->first();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login Success',
                'status' => true,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'data' => $user
            ], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Login Failed!'], 200);
        }
    }

    public function register(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'no_hp' => 'required|max:15|unique:users',
            'email' => 'email',
            'alamat' => 'required',
            'password' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = User::create([
            'id' => time(),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'id_role' => 3
        ]);

        $token = $cek->createToken('auth_token')->plainTextToken;

        if ($cek) {
            $data = [
                'message' => 'Create Success!',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ];
        } else {
            $data = [
                'message' => 'Create Failed!'
            ];
        }

        return response()->json($data, 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout Success!'
        ], 200);
    }

    public function nanskuy()
    {
        $data = User::all();
        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }
}
