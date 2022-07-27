<?php

namespace App\Http\Controllers;

use App\Models\LokasiRt;
use Illuminate\Http\Request;

class LokasiRtController extends Controller
{
    public function automatis()
    {
        $max = LokasiRt::max("kode_rt");
        $urutan = (int) substr($max, 4, 3);
        $urutan++;

        $huruf = 'RTQ-';
        $hasil = $huruf . sprintf('%03s', $urutan);

        return $hasil;
    }

    public function index()
    {
        $data = [
            "data_lokasi_rt" => LokasiRt::get(),
        ];

        return view("app.super_admin.lokasi_rt.v_index", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi_rt' => 'required'
        ]);

        $count = LokasiRt::where("lokasi_rt", $request->lokasi_rt)->count();

        if ($count > 0) {
            return redirect()->back()->with('message', '<script>Swal.fire("Gagal", "Tidak Boleh Duplikasi Data", "error")</script>');
        } else {
            LokasiRt::create([
                "kode_rt" => $this->automatis(),
                "lokasi_rt" => $request->lokasi_rt
            ]);

            return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan", "success")</script>');
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => LokasiRt::where("kode_rt", $request->kode_rt)->first()
        ];

        return view("app.super_admin.lokasi_rt.v_edit", $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'lokasi_rt' => 'required'
        ]);

        $count = LokasiRt::where("lokasi_rt", $request->lokasi_rt)->count();

        if ($count > 0) {
            return back()->with(["message" => "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            LokasiRt::where("kode_rt", decrypt($request->kode_rt))->update([
                "lokasi_rt" => $request->lokasi_rt
            ]);

            return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>"]);
        }
    }

    public function destroy($kode_rt)
    {
        LokasiRt::where("kode_rt", $kode_rt)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
