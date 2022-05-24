<?php

namespace App\Http\Controllers;

use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\KategoriPelajaran;
use App\Models\KategoriPelajaranTadribat;
use App\Models\KategoriPenilaian;
use App\Models\LokasiRt;
use App\Models\NilaiTadribat;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianKategoriTadribatController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            "data_cabang" => LokasiRt::all(),
            "data_jenjang" => Jenjang::all(),
            "data_kategori" => KategoriPenilaian::where('slug', $request->segment(4))->first()
        ];

        return view("app.asatidz.penilaian_per_kategori.v_index", $data);
    }

    public function home($halaqah, $id_jenjang, Request $request)
    {
        $kategori = KategoriPenilaian::where('slug', $request->segment(4))->first();
        $data = [
            "data_kategori" => $kategori,
            'data_santri' => Santri::where('kode_halaqah', $halaqah)->where('id_jenjang', $id_jenjang)->get(),
            'data_pelajaran' => KategoriPelajaran::where('id_jenjang', $id_jenjang)->where('id_kategori_penilaian', $kategori->id)->get(),
        ];
        return view('app.asatidz.penilaian_per_kategori.tadribat.v_index', $data);
    }

    public function create($halaqah, $id_jenjang, $id_pelajaran)
    {
        $data = [
            'data_santri' => Santri::where('kode_halaqah', $halaqah)->where('id_jenjang', $id_jenjang)->get(),
            'id_pelajaran' => $id_pelajaran
        ];

        return view("app.asatidz.penilaian_per_kategori.tadribat.v_tambah", $data);
    }

    public function store($halaqah, $id_jenjang, Request $request)
    {
        foreach ($request->nilai as $index => $data) {
            $cek = NilaiTadribat::where('id_santri', $request->id_santri[$index])
                ->where('id_pelajaran_tadribat', $request->id_pelajaran)
                ->first();

            if ($cek) {
                NilaiTadribat::where('id_santri', $request->id_santri[$index])->update([
                    "nilai" => $request->nilai[$index]
                ]);
            } else {
                NilaiTadribat::create([
                    "id_asatidz" => Auth::user()->id,
                    "id_santri" => $request->id_santri[$index],
                    "id_pelajaran_tadribat" => $request->id_pelajaran,
                    "nilai" => $request->nilai[$index]
                ]);
            }
        }

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Inputkan', 'success')</script>"]);
    }
}
