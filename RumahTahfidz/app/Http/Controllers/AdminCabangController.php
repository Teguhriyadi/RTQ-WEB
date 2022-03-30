<?php

namespace App\Http\Controllers;

use App\Models\AdminCabang;
use App\Models\Cabang;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $data = [
            "data_admin_cabang" => AdminCabang::orderBy("id", "ASC")->get(),
            "data_cabang" => Cabang::count(),
            "cabang" => Cabang::orderBy("id", "ASC")->get()
        ];

        return view("app.super_admin.admin_cabang.v_index", $data);
    }

    public function store(Request $request)
    {
        AdminCabang::create($request->all());

        User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt("admincabang"),
            "alamat" => "Bandung",
            "id_role" => 2,
            "tempat_lahir" => "NULL",
        ]);

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => AdminCabang::where("id", $request->id)->first(),
            "cabang" => Cabang::orderBy("id", "ASC")->get()
        ];

        return view("app.super_admin.admin_cabang.v_edit", $data);
    }

    public function update(Request $request)
    {
        AdminCabang::where("id", $request->id)->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "no_hp" => $request->no_hp,
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "id_cabang" => $request->id_cabang
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        AdminCabang::where("id", $id)->delete();

        return redirect()->back();
    }
}
