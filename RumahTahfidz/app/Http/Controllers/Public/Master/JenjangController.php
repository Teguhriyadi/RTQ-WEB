<?php

namespace App\Http\Controllers\Public\Master;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $data["jenjang"] = Jenjang::orderBy("jenjang", "DESC")->get();

        return view("app.public.master.jenjang.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>")->withInput();
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

        return view("app.public.master.jenjang.v_edit", $data);
    }

    public function update(Request $request)
    {
        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0) {
            return back()->with(["message" => "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            Jenjang::where("id", decrypt($request->id))->update([
                "jenjang" => $request->jenjang
            ]);

            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success');</script>"])->withInput();
        }
    }

    public function destroy($id)
    {
        Jenjang::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
