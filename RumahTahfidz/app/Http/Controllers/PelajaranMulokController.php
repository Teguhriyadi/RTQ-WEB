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
        $cek = PelajaranMulok::where("pelajaran", $request->pelajaran)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            PelajaranMulok::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
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

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        PelajaranMulok::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
