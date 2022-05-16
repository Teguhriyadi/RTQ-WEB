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
        $cek = PelajaranImla::where("pelajaran", $request->pelajaran)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            PelajaranImla::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }

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

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        PelajaranImla::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
