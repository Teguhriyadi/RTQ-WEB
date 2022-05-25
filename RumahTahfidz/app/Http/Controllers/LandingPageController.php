<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\KategoriPenilaian;
use App\Models\LokasiRt;
use App\Models\Pesan;
use App\Models\ProfilWeb;
use App\Models\Santri;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function layouts()
    {
        return view("app.landing.layouts.template");
    }

    public function home()
    {
        $data = ProfilWeb::select("id", "nama", "email", "logo", "singkatan", "no_hp", "alamat")->first();
        $data2 = [
            "data_blog" => Blog::get(),
            "jumlah_santri" => Santri::where("status", 1)->count(),
            "jumlah_asatidz" => Asatidz::count(),
            "jumlah_cabang" => LokasiRt::count(),
            "jumlah_program" => KategoriPenilaian::count()
        ];

        return view("app.landing.v_home", $data2, compact('data'));
    }

    public function kontak()
    {
        return view("app.landing.kontak.v_index");
    }

    public function pesan(Request $request)
    {
        Pesan::create([
            "id_pesan" => time(),
            "nama" => $request->nama,
            "email" => $request->email,
            "judul" => $request->judul,
            "pesan" => $request->pesan
        ]);

        return redirect("/");
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
