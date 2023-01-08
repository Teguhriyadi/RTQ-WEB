<?php

namespace App\Http\Controllers\Public\Master;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data["kelas"] = Kelas::orderBy("created_at", "DESC")->get();

        return view("app.public.master.kelas.v_index", $data);
    }

    public function edit(Request $request)
    {
        $data["edit"] = Kelas::where("id", $request->id)->first();

        return view("app.public.master.kelas.v_edit", $data);
    }

    public function store(Request $request)
    {
        $cek = Kelas::where("nama_kelas", $request->nama_kelas)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error');</script>")->withInput();
        } else {
            Kelas::create($request->all());
            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success')</script>");
        }
    }

    public function update(Request $request)
    {
        $count = Kelas::where("nama_kelas", $request->nama_kelas)->count();

        if ($count > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error')</script>");
        } else {
            Kelas::where("id", decrypt($request->id))->update([
                "nama_kelas" => $request->nama_kelas
            ]);

            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah!', 'success')</script>")->withInput();
        }
    }

    public function destroy($id)
    {
        Kelas::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }
}
