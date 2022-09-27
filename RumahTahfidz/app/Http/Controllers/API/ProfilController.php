<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\HakAkses;
use App\Models\User;
use App\Models\Role;
use App\Models\Santri;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function detail(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();

        if (!$user) {
            return response()->json(['message' => 'Get data failed!'], 401);
        }

        $hak_akses = HakAkses::where('id', $user->id_hak_akses)->first();
        $role = Role::where('id', $hak_akses->id_role)->first();

        if ($hak_akses->id_role == 3) {
            $data = [
                'nama' => $user->nama,
                'email' => $user->email,
                'alamat' => $user->alamat,
                'gambar' => $user->gambar,
                'tempat_lahir' => $user->tempat_lahir,
                'tanggal_lahir' => $user->tanggal_lahir,
                'hak_akses' => $role->keterangan,
                'token' => $user->token,
                'jenis_kelamin' => $user->jenis_kelamin,
                'nik' => '',
                'no_kk' => '',
            ];
        } else {
            $wali_santri = WaliSantri::where('id', $user->id)->first();
            $data = [
                'nama' => $user->nama,
                'email' => $user->email,
                'alamat' => $user->alamat,
                'gambar' => $user->gambar,
                'tempat_lahir' => $user->tempat_lahir,
                'tanggal_lahir' => $user->tanggal_lahir,
                'hak_akses' => $role->keterangan,
                'token' => $user->token,
                'jenis_kelamin' => $user->jenis_kelamin,
                'nik' => $wali_santri->nik,
                'no_kk' => $wali_santri->no_kk,
            ];
        }


        return response()->json($data, 200);
    }
}
