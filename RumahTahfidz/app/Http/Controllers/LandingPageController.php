<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use App\Models\Pesan;
use App\Models\Profil;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function layouts()
    {
        return view("app.landing.layouts.template");
    }

    public function home()
    {
        $data = Profil::select("id", "nama", "email", "logo", "singkatan", "no_hp", "alamat")->first();
        $data2 = [
            "data_blog" => Blog::get()
        ];

        return view("app.landing.v_home", $data2, compact('data'));
    }

    public function kontak()
    {
        return view("app.landing.kontak.v_index");
    }

    public function kirim_pesan(Request $request)
    {
        Pesan::create([
            "id_pesan" => time(),
            "nama" => $request->nama,
            "email" => $request->email,
            "judul" => $request->judul,
            "pesan" => $request->pesan
        ]);

        return redirect()->back();
    }

    public function blog()
    {
        $data = [
            "data_blog" => Blog::latest()->paginate(1),
            "data_kategori" => Kategori::get()
        ];

        return view("app.landing.v_blog", $data);
    }
}
