<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\PelajaranTadribat;
use App\Models\SettingKategoriTadribat;
use Illuminate\Http\Request;

class SettingKategoriTadribatController extends Controller
{
    public function index()
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_pelajaran_tadribat" => PelajaranTadribat::get(),
            "data_setting_tadribat" => SettingKategoriTadribat::get()
        ];

        return view("app.super_admin.settings.kategori.tadribat.v_index", $data);
    }

    public function store(Request $request)
    {
        SettingKategoriTadribat::create($request->all);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "data_jenjang" => Jenjang::get(),
            "data_pelajaran_tadribat" => PelajaranTadribat::get(),
            "edit" => SettingKategoriTadribat::where("id", $request->id)->get()
        ];

        return view("app.super_admin.settings.kategori.tadribat.v_edit", $data);
    }

    public function update(Request $request)
    {
        SettingKategoriTadribat::where("id", $request->id)->update([
            "id_jenjang" => $request->id_jenjang,
            "id_pelajaran_tadribat" => $request->id_pelajaran_tadribat
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        SettingKategoriTadribat::where("id", $id)->delete();

        return redirect()->back();
    }
}
