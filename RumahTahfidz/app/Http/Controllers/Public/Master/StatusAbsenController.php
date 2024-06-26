<?php

namespace App\Http\Controllers\Public\Master;

use App\Http\Controllers\Controller;
use App\Models\StatusAbsen;
use Illuminate\Http\Request;

class StatusAbsenController extends Controller
{
    public function index()
    {
        $data["status"] = StatusAbsen::orderBy("keterangan_absen", "DESC")->get();

        return view("app.public.master.status_absen.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = StatusAbsen::where("keterangan_absen", $request->keterangan_absen)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>")->withInput();
        } else {
            StatusAbsen::create($request->all());

            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success');</script>");
        }
    }

    public function edit(Request $request)
    {
        $data["edit"] = StatusAbsen::where("id", $request->id)->first();

        return view("app.public.master.status_absen.v_edit", $data);
    }

    public function update(Request $request)
    {
        $count = StatusAbsen::where("keterangan_absen", $request->keterangan_absen)->count();

        if ($count > 0) {
            return back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            StatusAbsen::where("id", $request->id)->update([
                "keterangan_absen" => $request->keterangan_absen
            ]);

            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"])->withInput();
        }
    }

    public function destroy($id)
    {
        StatusAbsen::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
