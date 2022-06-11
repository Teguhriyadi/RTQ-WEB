<?php

namespace App\Http\Controllers;

use App\Models\BesaranIuran;
use Illuminate\Http\Request;

class BesaranIuranController extends Controller
{
    public function index()
    {
        $data = [
            "data_besaran_iuran" => BesaranIuran::orderBy("besaran", "DESC")->get()
        ];

        return view("app.super_admin.data_master.besaran_iuran.v_index", $data);
    }

    public function store(Request $request)
    {
        $besaran = str_replace('.', '', $request->besaran);
        $count = BesaranIuran::where("besaran", $besaran)->count();

        if ($count > 0) {
            return back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            BesaranIuran::create($request->all());

            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => BesaranIuran::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.besaran_iuran.v_edit", $data);
    }

    public function update(Request $request)
    {
        BesaranIuran::where("id", $request->id)->update([
            "besaran" => str_replace('.', '', $request->besaran)
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        BesaranIuran::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
