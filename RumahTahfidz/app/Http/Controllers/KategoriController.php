<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => Kategori::get()
        ];

        return view("app.super_admin.halaman_utama.kategori.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "kategori" => "required"
        ]);

        $cek = Kategori::where("kategori", $request->kategori)->count();

        if ($cek > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error')</script>"]);
        } else {
            Kategori::create([
                "kategori" => $request->kategori,
                "slug" => Str::slug($request->kategori)
            ]);

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success')</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Kategori::where("id", $request->id)->first()
        ];

        return view("app.super_admin.halaman_utama.kategori.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "kategori" => "required"
        ]);

        $count = Kategori::where("kategori", $request->kategori)->count();

        if ($count > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            Kategori::where("id", $request->id)->update([
                "kategori" => $request->kategori,
                "slug" => Str::slug($request->kategori),
            ]);

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
        }
    }

    public function destroy($id)
    {
        Kategori::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
