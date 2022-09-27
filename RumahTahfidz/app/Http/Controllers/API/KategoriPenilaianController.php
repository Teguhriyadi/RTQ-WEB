<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriPelajaran;
use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;

class KategoriPenilaianController extends Controller
{
    public function all()
    {
        $cek = KategoriPenilaian::all();

        if ($cek->count() < 1) {
            $data = "Data tidak ada.";
        } else {
            $data = $cek;
        }

        return response()->json($data, 200);
    }

    public function show($id_jenjang, $id_kategori)
    {
        $data = KategoriPelajaran::where("id_jenjang", $id_jenjang)->where("id_kategori_penilaian", $id_kategori)->get();

        if ($data->count() > 0) {
            $d = [];
            foreach ($data as $c) {
                $d[] = [
                    "id" => $c->id,
                    "id_jenjang" => $c->id_jenjang,
                    "id_kategori" => $c->getKategoriPenilaian->id,
                    "nama_pelajaran" => $c->getPelajaran->nama_pelajaran
                ];
                return response()->json($d, 200);
            }
            return response()->json($d, 200);
        } else {
            $d2 = 'null';
            return response()->json($d2, 200);
        }
    }
}
