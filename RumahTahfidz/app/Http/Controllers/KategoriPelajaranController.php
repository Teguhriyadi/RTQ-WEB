<?php

namespace App\Http\Controllers;

use App\Models\KategoriPelajaran;
use Illuminate\Http\Request;

class KategoriPelajaranController extends Controller
{
    public function index()
    {
        $data = [
            "data_kategori" => KategoriPelajaran::get()
        ];

        return view("app.super_admin.settings.kategori_pelajaran.v_index", $data);
    }
}
