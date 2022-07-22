<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\AdminLokasiRt;
use App\Models\BesaranIuran;
use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\KategoriPelajaran;
use App\Models\Kelas;
use App\Models\LokasiRt;
use App\Models\Nilai;
use App\Models\NominalIuran;
use App\Models\Santri;
use App\Models\WaliSantri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SantriController extends Controller
{
    public function index()
    {
        $data = [
            "belum_terkonfimasi" => Santri::where("status", 0)->count()
        ];

        return view("app.public.santri.v_index", $data);
    }

    public function create($id)
    {
        $data = [
            "data_kelas" => Kelas::get(),
            "data_besaran" => BesaranIuran::get(),
            "data_halaqah" => Halaqah::get(),
            "data_wali" => WaliSantri::where("id", $id)->first(),
            "data_nominal_iuran" => NominalIuran::where("status", 1)->first()
        ];

        return view("app.public.santri.v_create", $data);
    }

    public function store(Request $request)
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
        $santri->id_nominal_iuran = $request->id_nominal_iuran;
        $santri->id_besaran = $request->id_besaran;
        $santri->foto = url('storage/' . $data);
        $santri->save();

        $administrasi = new Administrasi;

        $administrasi->id_santri = $santri->id;
        $administrasi->nominal = $request->nominal;

        $administrasi->save();

        return redirect("/app/sistem/santri")->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan!", "success");</script>');
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
                $string = str_replace(url('storage/'), "", $request->foto_lama);
                Storage::delete($string);
            }

            $data = $request->file("foto")->store("santri");
            $data = url('storage/' . $data);
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
        $santri = Santri::where("id", $id)->first();

        $string = str_replace(url('storage/'), "", $santri->foto);
        Storage::delete($string);

        $santri->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }

    public function tambah_data_santri(Request $request)
    {
        $data = [
            "data_wali" => WaliSantri::where("id", $request->id)->first(),
            "data_kelas" => Kelas::all(),
            "data_nominal_iuran" => NominalIuran::where("status", 1)->first(),
            "data_besaran" => BesaranIuran::get(),
            "data_halaqah" => Halaqah::all()
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

        if (empty($request->prestasi_anak)) {
            $prestasi_anak = NULL;
        } else {
            $prestasi_anak = $request->prestasi_anak;
        }

        $santri->prestasi_anak = $prestasi_anak;
        $santri->sekolah = $request->sekolah;

        if (empty($request->id_kelas)) {
            $id_kelas = 0;
        } else {
            $id_kelas = $request->id_kelas;
        }

        $santri->id_kelas = $id_kelas;
        $santri->kode_halaqah = $request->kode_halaqah;
        $santri->id_wali = $request->id_wali;
        $santri->id_nominal_iuran = $request->id_nominal;
        $santri->id_besaran = $request->id_besaran;
        $santri->foto = url("storage/" . $data);

        $santri->save();

        $administrasi = new Administrasi;

        $administrasi->id_santri = $santri->id;
        $administrasi->nominal = $request->nominal;

        $administrasi->save();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil','Data Berhasil di Tambah', 'success')</script>")->withInput();
    }

    public function sertifikat($id)
    {
        $santri = Santri::where("id", $id)->first();
        $template = new \PhpOffice\PhpWord\TemplateProcessor(public_path("sertifikat/sertifikat.docx"));
        $template->setValues([
            "nama" => $santri->nama_lengkap,
            "jenjang" => $santri->getJenjang->jenjang,
            "tanggal_terbit" => Carbon::now()->isoFormat("D MMMM Y")
        ]);

        $template->saveAs(public_path("arsip/SERTIFIKAT_" . Str::upper($santri->nama_lengkap) . "_" . $santri->nis . ".docx"));
        return response()->download(public_path("arsip/SERTIFIKAT_" . Str::upper($santri->nama_lengkap) . "_" . $santri->nis . ".docx"));
    }

    public function datatables()
    {
        if (Auth::user()->getAkses->id_role == 1) {
            $santri = Santri::get();
        } else {
            if (Santri::count() < 1) {
                $santri = Santri::get();
            } else {
                $user = AdminLokasiRt::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->first();

                $lokasi = LokasiRt::where("kode_rt", $user->kode_rt)->first();
                $halaqah = Halaqah::where("kode_rt", $lokasi->kode_rt)->first();

                $santri = Santri::where("status", 1)->where("kode_halaqah", $halaqah->kode_halaqah)->get();
            }
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
                    $aksiBtn = '
                    <a href="' . url("/app/sistem/santri/" . $row["id"]) . '" class="btn btn-info btn-sm">
                        <i class="fa fa-search"></i> Detail
                    </a>';

                    $aksiBtn .= '
                    <a href="' . url("/app/sistem/santri/" . $row["id"] . "/view_sertifikat") . '" class="btn btn-primary btn-sm">
                        <i class="fa fa-file-pdf-o"></i> Detail
                    </a>';
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

    public function jenjang_santri()
    {
        $data = [
            "data_kategori_satu" => KategoriPelajaran::where('id_kategori_penilaian', 1)->get(),
            "data_kategori_dua" => KategoriPelajaran::where("id_kategori_penilaian", 2)->get(),
            "data_jenjang" => Jenjang::get()
        ];

        return view("app.public.santri.v_jenjang_santri", $data);
    }

    public function jenjang_santri_dua(Request $request)
    {
        $data = [
            "data_kategori_satu" => KategoriPelajaran::where('id_kategori_penilaian', 1)->get(),
            "data_kategori_dua" => KategoriPelajaran::where("id_kategori_penilaian", 2)->get(),
            "data_santri" => Santri::where("status", 1)->where("id_jenjang", $request->jenjang)->paginate(10),
            "cek" => Santri::where("status", 1)->where("id_jenjang", $request->jenjang)->count(),
            "data_jenjang" => Jenjang::get(),
            "edit" => Jenjang::where("id", $request->jenjang)->first()
        ];

        return view("app.public.santri.v_jenjang_santri", $data);
    }

    public function post_jenjang_santri(Request $request)
    {
        foreach ($request->id_santri as $data => $value) {
            Santri::where("id", $request->id_santri[$data])->update([
                "id_jenjang" => $request->id_jenjang[$data],
            ]);
        }

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function view_sertifikat($id)
    {
        $detail = Santri::where("id", $id)->first();

        $data = [
            "detail" => Santri::where("id", $id)->first(),
            "data_nilai" => Nilai::where("id_santri", $detail->id)->selectRaw("id_jenjang")->distinct()->get()
        ];

        return view("app.public.santri.v_sertifikat", $data);
    }
}
