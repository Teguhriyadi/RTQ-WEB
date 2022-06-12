<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\AdminLokasiRt;
use App\Models\BesaranIuran;
use App\Models\Halaqah;
use App\Models\Kelas;
use App\Models\LokasiRt;
use App\Models\NominalIuran;
use App\Models\Santri;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class SantriController extends Controller
{
    public function index()
    {
        $data = [
            "belum_terkonfimasi" => Santri::where("status", 0)->count()
        ];

        return view("app.public.santri.v_index", $data);
    }

    public function store(Request $request)
    {
        $santri = new Santri;

        $santri->nis = $request->nis;
        $santri->nama_lengkap = $request->nama_lengkap;
        $santri->nama_panggilan = $request->nama_panggilan;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->jenis_kelamin = $request->jenis_kelamin;
        $santri->alamat = $request->alamat;
        $santri->prestasi_anak = $request->prestasi_anak;
        $santri->sekolah = $request->sekolah;
        $santri->id_kelas = $request->id_kelas;
        $santri->kode_halaqah = $request->kode_halaqah;
        $santri->id_wali = $request->id_wali;
        $santri->id_nominal_iuran = $request->id_nominal;

        $santri->save();

        $administrasi = new Administrasi;

        $administrasi->id_santri = $santri->id;
        $administrasi->nominal = $request->nominal;

        $administrasi->save();

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan!", "success");</script>');
    }

    public function show($id)
    {
        $data = [
            "detail" => Santri::where("id", $id)->first()
        ];

        return view("app.public.santri.v_detail", $data);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Santri::where("id", $request->id)->first(),
            "data_kelas" => Kelas::all(),
            "data_besaran" => BesaranIuran::get()
        ];

        return view("app.public.santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("foto")) {
            if ($request->foto_lama) {
                Storage::delete($request->foto_lama);
            }

            $data = $request->file("foto")->store("santri");
        } else {
            $data = $request->foto;
        }

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
            "id_besaran" => $request->id_besaran,
            "foto" => $data
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
            "data_kelas" => Kelas::all(),
            "data_nominal_iuran" => NominalIuran::where("status", 1)->first(),
            "data_besaran" => BesaranIuran::get()
        ];

        return view("app.public.wali_santri.v_tambah_santri", $data);
    }

    public function tambah_santri_by_wali(Request $request)
    {
        if ($request->file("foto")) {
            $data = $request->file("foto")->store("santri");
        }

        $santri = new Santri;

        $santri->nis = $request->nis;
        $santri->nama_lengkap = $request->nama_lengkap;
        $santri->nama_panggilan = $request->nama_panggilan;
        $santri->tempat_lahir = $request->tempat_lahir;
        $santri->tanggal_lahir = $request->tanggal_lahir;
        $santri->jenis_kelamin = $request->jenis_kelamin;
        $santri->alamat = $request->alamat;
        $santri->prestasi_anak = $request->prestasi_anak;
        $santri->sekolah = $request->sekolah;
        $santri->id_kelas = $request->id_kelas;
        $santri->kode_halaqah = $request->kode_halaqah;
        $santri->id_wali = $request->id_wali;
        $santri->id_nominal_iuran = $request->id_nominal;
        $santri->id_besaran = $request->id_besaran;
        $santri->foto = $data;

        $santri->save();

        $administrasi = new Administrasi;

        $administrasi->id_santri = $santri->id;
        $administrasi->nominal = $request->nominal;

        $administrasi->save();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil','Data Berhasil di Tambah', 'success')</script>");
    }

    public function datatables()
    {
        if (Auth::user()->getAkses->id_role == 1) {
            $santri = Santri::get();
        } else {
            $user = AdminLokasiRt::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->first();
            $lokasi = LokasiRt::where("kode_rt", $user->kode_rt)->first();
            $halaqah = Halaqah::where("kode_rt", $lokasi->kode_rt)->first();

            $santri = Santri::where("status", 1)->where("kode_halaqah", $halaqah->kode_halaqah)->get();
        }

        $data = array();
        foreach ($santri as $s) {
            if ($s->id_jenjang == NULL) {
                $jenjang = "Belum Ada Jenjang";
            } else {
                $jenjang = $s->getJenjang->jenjang;
            }
            $data[] = [
                'id' => $s->id,
                'nis' => $s->nis,
                'nama_lengkap' => $s->nama_lengkap,
                'jenjang' => $jenjang,
                'nama_wali' => $s->getWali->getUser->nama
            ];
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                if (Auth::user()->getAkses->id_role == 1) {
                    $aksiBtn = '<div class="text-center">
                    <a href="' . url("/app/sistem/santri/" . $row["id"]) . '" class="btn btn-info btn-sm">
                        <i class="fa fa-search"></i> Detail
                    </a></div>';
                } else {
                    $aksiBtn = '<button onclick="editDataSantri(' . $row["id"] . ')" type="button"
                    class="btn btn-warning btn-sm text-white" id="btnEdit"
                    data-target="#modalEdit" data-toggle="modal">
                    <i class="fa fa-edit"></i> Edit
                </button>';
                    $aksiBtn .= '<form action="' . url("app/sistem/santri/" . $row["id"]) . '"
                method="POST" style="display: inline">
                ' . method_field('delete') . '
                ' . csrf_field() . '
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </form>';
                }
                return $aksiBtn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
