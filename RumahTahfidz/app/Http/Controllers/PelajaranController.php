<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $data = [
            "data_pelajaran" => Pelajaran::get()
        ];

        return view("app.super_admin.pelajaran.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_pelajaran" => "required"
        ]);

        Pelajaran::create($request->all());

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Pelajaran::where("id", $request->id)->first()
        ];

        return view("app.super_admin.pelajaran.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama_pelajaran" => "required"
        ]);

        Pelajaran::where("id", $request->id)->update([
            "nama_pelajaran" => $request->nama_pelajaran
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        Pelajaran::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
