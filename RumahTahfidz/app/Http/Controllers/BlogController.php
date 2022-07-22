<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            "j_kategori" => Kategori::count(),
            "data_kategori" => Kategori::get(),
            "data_blog" => Blog::latest()->get()
        ];

        return view("app.super_admin.halaman_utama.blog.v_index", $data);
    }

    public function create()
    {
        $data = [
            "data_kategori" => Kategori::get()
        ];

        return view("app.super_admin.halaman_utama.blog.v_create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,gif|image'
        ]);

        if ($request->file("foto")) {
            $data = $request->file("foto")->store("foto");
        }

        Blog::create([
            "id_kategori" => $request->id_kategori,
            "id_user" => Auth::user()->id,
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return redirect('app/sistem/blog')->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function show($id)
    {
        $data = [
            "data_kategori" => Kategori::get(),
            "edit" => Blog::where("id", $id)->first()
        ];

        return view("app.super_admin.halaman_utama.blog.v_edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("foto")) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }

            $data = $request->file("foto")->store("foto");
        } else {
            $data = $request->oldGambar;
        }

        Blog::where("id", $request->id)->update([
            "id_kategori" => $request->id_kategori,
            "id_user" => Auth::user()->id,
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "foto" => $data,
            "deskripsi" => $request->deskripsi
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy(Request $request, $id)
    {
        if ($request->hapusGambar) {
            Storage::delete($request->hapusGambar);
        }

        Blog::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
