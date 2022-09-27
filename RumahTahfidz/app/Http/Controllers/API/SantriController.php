<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\LokasiRt;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function view()
    {
        $santri = Santri::all();


        $data = [];

        foreach ($santri as $s) {
            $cabang = Halaqah::where('id', $s->id_cabang)->first();

            $data[] = [
                'nama' => $s->nama,
                'jenis_kelamin' => $s->jenis_kelamin,
                'alamat' => $s->alamat,
                'gambar' => $s->gambar,
                'nama_ayah' => $s->nama_ayah,
                'nama_ibu' => $s->nama_ibu,
                'no_hp' => $s->no_hp,
                'cabang' => $cabang->nama_cabang,
            ];
        }

        return response()->json($data);
    }

    public function viewByWaliSantri(Request $request)
    {
        $santri = Santri::where('id_wali', $request->user()->id)->get();

        $data = [];

        foreach ($santri as $s) {
            $data[] = [
                'id' => $s->id,
                'nis' => $s->nis,
                'nama' => $s->nama_lengkap,
                'alamat' => $s->alamat,
                'id_jenjang' => $s->id_jenjang,
                'jenjang' => $s->getJenjang->jenjang,
                'halaqah' => $s->kode_halaqah,
                'foto' => $s->foto,
            ];
        }

        return response()->json($data);
    }

    public function viewByHalaqahNJenjang($kode_halaqah, $id_jenjang)
    {
        $santri = Santri::where('kode_halaqah', $kode_halaqah)->where('id_jenjang', $id_jenjang)->get();


        if ($santri->count() > 0) {
            $data = [];
            foreach ($santri as $s) {
                $halaqah = Halaqah::where('kode_halaqah', $kode_halaqah)->first();
                $jenjang = Jenjang::where('id', $id_jenjang)->first();
                $data[] = [
                    'id' => $s->id,
                    'nis' => $s->nis,
                    'nama_lengkap' => $s->nama_lengkap,
                    'nama_halaqah' => $halaqah->nama_halaqah,
                    'jenjang' => $jenjang->jenjang,
                    'alamat' => $s->alamat,
                    'foto' => $s->foto,
                ];
            }
        } else {
            $data = "Data Santri Kosong";
        }

        return response()->json($data);
    }
}
