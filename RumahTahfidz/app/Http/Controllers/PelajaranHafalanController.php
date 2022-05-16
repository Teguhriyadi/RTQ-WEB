<?php

namespace App\Http\Controllers;

use App\Models\PelajaranHafalan;
use Illuminate\Http\Request;

class PelajaranHafalanController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran_hafalan" => PelajaranHafalan::get()
        ];

        return view("app.super_admin.pelajaran.hafalan.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = PelajaranHafalan::where("nama_surat", $request->nama_surat)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            PelajaranHafalan::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PelajaranHafalan::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.hafalan.v_edit", $data);
    }

    public function update(Request $request)
    {
        PelajaranHafalan::where("id", $request->id)->update([
            "nama_surat" => $request->nama_surat
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        PelajaranHafalan::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
