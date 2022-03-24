<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $data = [
            "data_cabang" => Cabang::orderBy("nama_cabang", "DESC")->get()
        ];

        return view("app.super_admin.cabang.v_index", $data);
    }

    public function store(Request $request)
    {
        Cabang::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Cabang::where("id", $request->id)->first()
        ];

        return view("app.super_admin.cabang.v_edit", $data);
    }

    public function update(Request $request)
    {
        Cabang::where("id", $request->id)->update([
            "nama_cabang" => $request->nama_cabang
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Cabang::where("id", $id)->delete();

        return redirect()->back();
    }
}