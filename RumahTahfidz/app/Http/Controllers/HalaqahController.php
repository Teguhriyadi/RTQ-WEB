<?php

namespace App\Http\Controllers;

use App\Models\Halaqah;
use App\Models\LokasiRt;
use Illuminate\Http\Request;

class HalaqahController extends Controller
{
    public function index()
    {
        $data = [
            "data_halaqah" => Halaqah::get(),
            "data_lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.halaqah.v_index", $data);
    }

    public function store(Request $request)
    {
        Halaqah::create($request->all());

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Halaqah::where("kode_halaqah", $request->kode_halaqah)->first(),
            "data_lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.halaqah.v_edit", $data);
    }

    public function update(Request $request)
    {
        Halaqah::where("kode_halaqah", $request->kode_halaqah)->update([
            "nama_halaqah" => $request->nama_halaqah,
            "kode_rt" => $request->kode_rt_new
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($kode_halaqah)
    {
        Halaqah::where("kode_halaqah", $kode_halaqah)->delete();

        return redirect()->back();
    }
}
