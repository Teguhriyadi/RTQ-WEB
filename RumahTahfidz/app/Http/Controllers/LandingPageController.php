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
use App\Models\StrukturOrganisasi;
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
            "jumlah_program" => KategoriPenilaian::count(),
            "data_organisasi" => StrukturOrganisasi::get()
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

    public function allBlog()
    {
        $data = [
            "data_blog" => Blog::latest()->paginate(1),
        ];

        return view("app.landing.v_blog", $data);
    }

    public function detailKategori($kategori)
    {
        $data = [
            "data_blog" => Blog::where("id_kategori", $kategori->id)->get(),
            "kategori" => $kategori
        ];

        return view("app.landing.v_blog", $data);
    }

    public function detailBlog($slug)
    {
        if ($slug != 'blog') {
            $kategori = Kategori::where("slug", $slug)->first();
            if ($kategori) {
                return $this->detailKategori($kategori);
            } else {
                $blog = Blog::where("slug", $slug)->first();
                if ($blog) {
                    return view("app.landing.v_detail_blog", compact('blog'));
                } else {
                    return $this->allBlog();
                }
            }
        } else {
            return $this->allBlog();
        }
    }
}
