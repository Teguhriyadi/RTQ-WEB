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
            "data_blog" => Blog::get()
        ];

        return view("app.super_admin.blog.v_index", $data);
    }

    public function store(Request $request)
    {
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

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "data_kategori" => Kategori::get(),
            "edit" => Blog::where("id", $request->id)->first()
        ];

        return view("app.super_admin.blog.v_edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("gambar")) {
            if ($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }

            $data = $request->file("gambar")->store("foto");
        }

        Blog::where("id", $request->id)->update([
            "id_kategori" => $request->id_kategori,
            "id_user" => Auth::user()->id,
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "foto" => $data
        ]);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->hapusGambar) {
            Storage::delete($request->hapusGambar);
        }

        Blog::where("id", $id)->delete();

        return redirect()->back();
    }
}
