<?php

namespace App\Http\Controllers;

use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriPenilaianController extends Controller
{
    public function index()
    {
        $data = [
            "data_penilaian" => KategoriPenilaian::get()
        ];

        return view("app.super_admin.settings.kategori.penilaian.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "kategori_penilaian" => "required"
        ]);

        $count = KategoriPenilaian::where("kategori_penilaian", $request->kategori_penilaian)->count();

        if ($count > 0) {
            return back()->with(["message" => "<script>Swal.fire('Gagal', 'Gagal di Tambahkan', 'error');</script>"]);
        } else {
            $validasi = $request->validate([
                'kategori_penilaian' => 'required',
            ]);

            $validasi['slug'] = Str::slug($request->kategori_penilaian);

            KategoriPenilaian::create($validasi);

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => KategoriPenilaian::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.kategori.penilaian.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "kategori_penilaian" => "required"
        ]);

        $count = KategoriPenilaian::where("kategori_penilaian", $request->kategori_penilaian)->count();

        if ($count > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Gagal', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            KategoriPenilaian::where("id", decrypt($request->id))->update([
                "kategori_penilaian" => $request->kategori_penilaian,
                "slug" => Str::slug($request->kategori_penilaian)
            ]);

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
        }
    }

    public function destroy($id)
    {
        KategoriPenilaian::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
