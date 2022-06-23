<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $data = [
            "data_jenjang" => Jenjang::orderBy("jenjang", "DESC")->get()
        ];

        return view("app.super_admin.data_master.jenjang.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "jenjang" => "required"
        ]);

        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
        } else {
            Jenjang::create($request->all());

            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Jenjang::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.jenjang.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "jenjang" => "required"
        ]);

        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            Jenjang::where("id", $request->id)->update([
                "jenjang" => $request->jenjang
            ]);

            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function destroy($id)
    {
        Jenjang::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
