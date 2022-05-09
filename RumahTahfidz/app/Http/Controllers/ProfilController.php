<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function web_profil()
    {
        $profil = Profil::select("id", "nama", "singkatan", "email", "no_hp", "alamat", "logo")->first();

        return view("app.administrator.profil.v_index", compact('profil'));
    }

    public function store(Request $request)
    {
        if ($request->file("logo")) {
            $data = $request->file("logo")->store("logo");
        } else {
            $data = NULL;
        }

        $profil = new Profil;

        $profil->nama = $request->nama;
        $profil->singkatan = $request->singkatan;
        $profil->no_hp = $request->no_hp;
        $profil->email = $request->email;
        $profil->alamat = $request->alamat;
        $profil->logo = $data;

        $profil->save();

        return redirect()->back();
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

        Profil::where("id", $id)->update([
            "nama" => $request->nama,
            "singkatan" => $request->singkatan,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "logo" => $data
        ]);

        return redirect()->back();
    }
}
