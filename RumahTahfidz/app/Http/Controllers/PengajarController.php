<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajar;
use App\Models\User;

class PengajarController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Pengajar::orderBy("id", "DESC")->get()
        ];

        return view("app.administrator.pengajar.v_index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("pengajar");
        }

        Pengajar::create($request->all());

        User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => "pengajar@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => $request->alamat,
            "id_role" => 3,
            "no_hp" => $request->telepon,
            "gambar" => $data,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir
        ]);

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Pengajar::where("id", $request->id)->first()
        ];

        return view("app.administrator.pengajar.v_edit", $data);
    }

    public function destroy($id)
    {
        Pengajar::where("id", $id)->delete();

        return redirect()->back();
    }
}
