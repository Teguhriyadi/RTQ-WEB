<?php

namespace App\Http\Controllers;

use App\Models\BesaranIuran;
use App\Models\BesaranIuranSantri;
use App\Models\Santri;
use Illuminate\Http\Request;

class BesaranIuranSantriController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Santri::get(),
            "data_besaran" => BesaranIuran::get(),
            "data_besaran_santri" => BesaranIuranSantri::get()
        ];

        return view("app.super_admin.data_master.besaran_iuran_santri.v_index", $data);
    }

    public function store(Request $request)
    {
        BesaranIuranSantri::create($request->all());

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "data_santri" => Santri::get(),
            "data_besaran" => BesaranIuran::get(),
            "edit" => BesaranIuranSantri::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.besaran_iuran_santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        BesaranIuranSantri::where("id", $request->id)->update([
            "id_santri" => $request->id_santri,
            "id_besaran" => $request->id_besaran
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        BesaranIuranSantri::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
