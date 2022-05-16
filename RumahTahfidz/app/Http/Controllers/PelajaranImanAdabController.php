<?php

namespace App\Http\Controllers;

use App\Models\PelajaranImanAdab;
use Illuminate\Http\Request;

class PelajaranImanAdabController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran_iman_adab" => PelajaranImanAdab::get()
        ];

        return view("app.super_admin.pelajaran.iman_&_adab.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = PelajaranImanAdab::where("pelajaran", $request->pelajaran)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            PelajaranImanAdab::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => PelajaranImanAdab::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.iman_&_adab.v_edit", $data);
    }

    public function update(Request $request)
    {
        PelajaranImanAdab::where("id", $request->id)->update([
            "pelajaran" => $request->pelajaran
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        PelajaranImanAdab::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
