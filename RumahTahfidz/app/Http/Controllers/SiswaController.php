<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Siswa::where("id_cabang", Auth::user()->getAdminCabang->id_cabang)->orderBy("id")->get()
        ];

        return view("app.administrator.siswa.v_index", $data);
    }

    public function store(Request $request)
    {

        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("santri");
        }

        Siswa::create([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "gambar" => $data,
            "nama_ayah" => $request->nama_ayah,
            "nama_ibu" => $request->nama_ibu,
            "no_hp" => $request->no_hp,
            "id_cabang" => Auth::user()->getAdminCabang->id
        ]);

        User::create([
            "nama" => $request->nama,
            "email" => "pengajar@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => $request->alamat,
            "id_role" => 2,
            "no_hp" => $request->telepon,
            "gambar" => $data,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir
        ]);

        return redirect()->back()->with('message', '<script>Swal.fire("message", "Data Berhasil di Tambahkan!", "success");</script>');
    }
}
