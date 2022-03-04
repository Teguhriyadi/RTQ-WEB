<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view("app.administrator.profil.index");
    }

    public function info_profil($no_hp)
    {
        $data = User::where("no_hp", $no_hp)->first();

        $detail = '';

        if ($data->id_role == 2) {
            $detail = Pengajar::where("telepon", $data->no_hp)->first();
        } else if ($data->id_role == 3) {
            $detail = Siswa::where("no_hp", $data->no_hp)->first();
        }

        if ($detail) {
            $profil = [
                'nama' => $detail->nama,
                'email' => $data->email,
                "no_hp" => $data->no_hp,
                "alamat" => $data->alamat,
                "jenis_kelamin" => $detail->jenis_kelamin,
                "keterangan" => $data->getRole->keterangan,
            ];
        } else {
            $profil = [
                'nama' => $data->nama,
                'email' => $data->email,
                "no_hp" => $data->no_hp,
                "alamat" => $data->alamat,
                "keterangan" => $data->getRole->keterangan,
                "tempat_lahir" => $data->tempat_lahir,
                "tanggal_lahir" => $data->tanggal_lahir
            ];
        }



        return response()->json(['message' => 'Request Success!', 'data' => $profil], 200);
    }
}
