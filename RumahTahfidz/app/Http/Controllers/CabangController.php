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
        $cek = Cabang::where("nama_cabang", $request->nama_cabang)->count();

        if ($cek > 0) {
            return redirect()->back()->with('message', '<script>Swal.fire("Oops", "Tidak Boleh Ada Duplikasi Data", "error")</script>');
        } else {
            Cabang::create($request->all());

            return redirect()->back()->with('message', '<script>Swal.fire("Wooww", "Data anda berhasil ditambahkan!", "success")</script>');
        }

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
        $cek = Cabang::where("nama_cabang", $request->nama_cabang)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            Cabang::where("id", $request->id)->update([
                "nama_cabang" => $request->nama_cabang
            ]);

            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        Cabang::where("id", $id)->delete();

        return redirect()->back();
    }
}
