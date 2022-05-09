<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::get()
        ];

        return view("app.super_admin.kategori.v_index", $data);
    }

    public function store(Request $request)
    {
        Kategori::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kategori::where("id", $request->id)->first()
        ];

        return view("app.super_admin.kategori.v_edit", $data);
    }

    public function update(Request $request)
    {
        Kategori::where("id", $request->id)->update([
            "kategori" => $request->kategori
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Kategori::where("id", $id)->delete();

        return redirect()->back();
    }
}
