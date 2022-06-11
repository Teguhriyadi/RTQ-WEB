<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Santri;
use Illuminate\Http\Request;

class TesSantriController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Santri::where("status", 0)->where("id_jenjang", "!=", NULL)->paginate(10)
        ];

        return view("app.administrator.tes_santri.v_index", $data);
    }

    public function create()
    {
        $data = [
            "data_santri" => Santri::where("id_jenjang", NULL)->get(),
            "data_jenjang" => Jenjang::get(),
            "jumlah_santri" => Santri::where("id_jenjang", NULL)->count()
        ];

        return view("app.administrator.tes_santri.v_tambah", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Santri::where("id", $request->id)->first(),
            "data_jenjang" => Jenjang::get()
        ];

        return view("app.administrator.tes_santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        foreach ($request->id_santri as $data => $value) {
            Santri::where("id", $request->id_santri[$data])->update([
                "id_jenjang" => $request->id_jenjang[$data],
            ]);
        }

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function simpan(Request $request)
    {
        Santri::where("id", $request->id)->update([
            "id_jenjang" => $request->id_jenjang
        ]);

        return redirect()->back();
    }

    public function detail($id)
    {
        Santri::where("id", $id)->update([
            "status" => 1
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success');</script>"]);
    }
}
