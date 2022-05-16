<?php

namespace App\Http\Controllers;

use App\Models\PelajaranTadribat;
use Illuminate\Http\Request;

class PelajaranTadribatController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran_tadribat" => PelajaranTadribat::get()
        ];

        return view("app.super_admin.pelajaran.tadribat.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = PelajaranTadribat::where("pelajaran", $request->pelajaran)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error')</script>"]);
        } else {
            PelajaranTadribat::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PelajaranTadribat::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.tadribat.v_edit", $data);
    }

    public function update(Request $request)
    {
        PelajaranTadribat::where("id", $request->id)->update([
            "pelajaran" => $request->pelajaran
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        PelajaranTadribat::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
