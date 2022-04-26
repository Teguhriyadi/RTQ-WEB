<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SantriController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Santri::orderBy("id")->get()
        ];

        return view("app.administrator.santri.v_index", $data);
    }

    public function store(Request $request)
    {
        Santri::create([
            "nis" => $request->nis,
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "prestasi_anak" => $request->prestasi_anak,
            "sekolah" => $request->sekolah,
            "id_kelas" => $request->id_kelas,
            "kode_halaqah" => $request->kode_halaqah,
            "id_wali" => $request->id_wali,
            "id_jenjang" => 1
        ]);

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan!", "success");</script>');
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Santri::where("id", $request->id)->first(),
            "data_kelas" => Kelas::all()
        ];

        return view("app.administrator.santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        Santri::where("id", $request->id)->update([
            "nis" => $request->nis,
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "prestasi_anak" => $request->prestasi_anak,
            "sekolah" => $request->sekolah,
            "id_kelas" => $request->id_kelas,
            "id_jenjang" => 1
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>");
    }

    public function destroy($id)
    {
        Santri::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }

    public function tambah_data_santri(Request $request)
    {
        $data = [
            "data_wali" => WaliSantri::where("id", $request->id)->first(),
            "data_kelas" => Kelas::all()
        ];

        return view("app.administrator.wali_santri.v_tambah_santri", $data);
    }

    public function tambah_santri_by_wali(Request $request)
    {
        Santri::create([
            "nis" => $request->nis,
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "alamat" => $request->alamat,
            "prestasi_anak" => $request->prestasi_anak,
            "sekolah" => $request->sekolah,
            "id_kelas" => $request->id_kelas,
            "kode_halaqah" => $request->kode_halaqah,
            "id_wali" => $request->id_wali,
            "id_jenjang" => 1
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil','Data Berhasil di Tambah', 'success')</script>");
    }
}
