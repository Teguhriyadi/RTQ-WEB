<?php

namespace App\Http\Controllers;

use App\Models\AdminLokasiRt;
use App\Models\Halaqah;
use App\Models\Kelas;
use App\Models\LokasiRt;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

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
            "id_wali" => $request->id_wali
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
            "id_kelas" => $request->id_kelas
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

    public function datatables()
    {
        $user = AdminLokasiRt::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->first();
        $lokasi = LokasiRt::where("kode_rt", $user->kode_rt)->first();
        $halaqah = Halaqah::where("kode_rt", $lokasi->kode_rt)->first();
        $santri = Santri::where("kode_halaqah", $halaqah->kode_halaqah)->get();

        $data = array();
        foreach ($santri as $s) {
            $data[] = [
                'nis' => $s->nis,
                'nama_lengkap' => $s->nama_lengkap,
                'jenjang' => $s->getJenjang->jenjang,
                'nama_wali' => $s->getWali->getUser->nama,
            ];
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->toJson();
    }
}
