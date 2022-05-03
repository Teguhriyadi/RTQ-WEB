<?php

namespace App\Http\Controllers;

use App\Models\PelajaranImla;
use Illuminate\Http\Request;

class PelajaranImlaController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran_imla" => PelajaranImla::get()
        ];

        return view("app.super_admin.pelajaran.imla.v_index", $data);
    }

    public function store(Request $request)
    {
        PelajaranImla::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PelajaranImla::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.imla.v_edit", $data);
    }

    public function update(Request $request)
    {
        PelajaranImla::where("id", $request->id)->update([
            "pelajaran" => $request->pelajaran
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        PelajaranImla::where("id", $id)->delete();

        return redirect()->back();
    }
}
