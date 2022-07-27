<?php

namespace App\Http\Controllers;

use App\Models\Halaqah;
use App\Models\LokasiRt;
use Illuminate\Http\Request;

class HalaqahController extends Controller
{
    public function automatis()
    {
        $max = Halaqah::max("kode_halaqah");
        $urutan = (int) substr($max, 4, 3);
        $urutan++;

        $huruf = 'HLQ-';
        $hasil = $huruf . sprintf('%03s', $urutan);

        return $hasil;
    }

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
        $request->validate([
            'nama_halaqah' => 'required',
            'kode_rt' => 'required'
        ]);

        Halaqah::create([
            "kode_halaqah" => $this->automatis(),
            "nama_halaqah" => $request->nama_halaqah,
            "kode_rt" => $request->kode_rt
        ]);

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
        $request->validate([
            'nama_halaqah' => 'required',
            'kode_rt' => 'required'
        ]);

        Halaqah::where("kode_halaqah", decrypt($request->kode_halaqah))->update([
            "nama_halaqah" => $request->nama_halaqah,
            "kode_rt" => $request->kode_rt
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($kode_halaqah)
    {
        Halaqah::where("kode_halaqah", $kode_halaqah)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
