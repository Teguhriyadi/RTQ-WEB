<?php

namespace App\Http\Controllers;

use App\Models\StatusAbsen;
use Illuminate\Http\Request;

class StatusAbsenController extends Controller
{
    public function index()
    {
        $data = [
            "data_status" => StatusAbsen::orderBy("keterangan_absen", "DESC")->get()
        ];

        return view("app.super_admin.data_master.status_absen.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "keterangan_absen" => "required"
        ]);

        $cek = StatusAbsen::where("keterangan_absen", $request->keterangan_absen)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>")->withInput();
        } else {
            StatusAbsen::create($request->all());

            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success');</script>")->withInput();
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => StatusAbsen::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.status_absen.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "keterangan_absen" => "required"
        ]);

        $cek = StatusAbsen::where("keterangan_absen", $request->keterangan_absen)->count();

        StatusAbsen::where("id", $request->id)->update([
            "keterangan_absen" => $request->keterangan_absen
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"])->withInput();
    }

    public function destroy($id)
    {
        StatusAbsen::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
