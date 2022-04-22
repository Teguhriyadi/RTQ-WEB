<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Halaqah;
use Illuminate\Http\Request;

class HalaqahController extends Controller
{
    public function index()
    {
        $data = [
            "data_halaqah" => Halaqah::get(),
            "data_cabang" => Cabang::get()
        ];

        return view("app.super_admin.halaqah.v_index", $data);
    }

    public function store(Request $request)
    {
        Halaqah::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Halaqah::where("kode_halaqah", $request->kode_halaqah)->first(),
            "data_cabang" => Cabang::get()
        ];

        return view("app.super_admin.halaqah.v_edit", $data);
    }

    public function update(Request $request)
    {
        Halaqah::where("kode_halaqah", $request->kode_halaqah)->update([
            "nama_halaqah" => $request->nama_halaqah,
            "id_cabang" => $request->id_cabang_new
        ]);

        return redirect()->back();
    }

    public function destroy($kode_halaqah)
    {
        Halaqah::where("kode_halaqah", $kode_halaqah)->delete();

        return redirect()->back();
    }
}
