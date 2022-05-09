<?php

namespace App\Http\Controllers;

use App\Models\PelajaranMulok;
use Illuminate\Http\Request;

class PelajaranMulokController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran_mulok" => PelajaranMulok::get()
        ];

        return view("app.super_admin.pelajaran.mulok.v_index", $data);
    }

    public function store(Request $request)
    {
        PelajaranMulok::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PelajaranMulok::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.mulok.v_edit", $data);
    }

    public function update(Request $request)
    {
        PelajaranMulok::where("id", $request->id)->update([
            "pelajaran" => $request->pelajaran
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        PelajaranMulok::where("id", $id)->delete();

        return redirect()->back();
    }
}
