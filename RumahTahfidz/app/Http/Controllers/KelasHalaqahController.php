<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\Halaqah;
use App\Models\KelasHalaqah;
use Illuminate\Http\Request;

class KelasHalaqahController extends Controller
{
    public function index()
    {
        $data = [
            "data_kelas_halaqah" => KelasHalaqah::get(),
            "data_asatidz" => Asatidz::get(),
            "data_halaqah" => Halaqah::get()
        ];

        return view("app.super_admin.data_master.kelas_halaqah.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "kode_halaqah" => "required",
            "id_asatidz" => "required",
            "kelas_halaqah" => "required",
        ]);

        KelasHalaqah::create($request->all());

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Inputkan', 'success')</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "data_asatidz" => Asatidz::get(),
            "data_halaqah" => Halaqah::get(),
            "edit" => KelasHalaqah::where("id", $request->id)->first()
        ];

        return view("app.super_admin.data_master.kelas_halaqah.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "kode_halaqah" => "required",
            "id_asatidz" => "required",
            "kelas_halaqah" => "required",
        ]);

        KelasHalaqah::where("id", decrypt($request->id))->update([
            "id_asatidz" => $request->id_asatidz,
            "kode_halaqah" => $request->kode_halaqah,
            "kelas_halaqah" => $request->kelas_halaqah
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success')</script>"]);
    }

    public function destroy($id)
    {
        KelasHalaqah::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
