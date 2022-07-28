<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            "data_kelas" => Kelas::all()
        ];

        return view("app.super_admin.data_master.kelas.v_index", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kelas::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.kelas.v_edit", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama_kelas" => "required"
        ]);

        $cek = Kelas::where("nama_kelas", $request->nama_kelas)->count();

        if ($cek > 0) {
            return redirect()->back()->with("message", "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error');</script>")->withInput();
        } else {
            Kelas::create($request->all());
            return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambah', 'success')</script>")->withInput();
        }
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama_kelas" => "required"
        ]);

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
