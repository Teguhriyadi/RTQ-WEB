<?php

namespace App\Http\Controllers\AdminCabang\Jenjang;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\KategoriPelajaran;
use App\Models\Santri;
use Illuminate\Http\Request;

class JenjangSantriController extends Controller
{
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
}
