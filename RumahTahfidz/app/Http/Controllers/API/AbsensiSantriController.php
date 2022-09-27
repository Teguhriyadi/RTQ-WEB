<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Santri;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AbsensiSantriController extends Controller
{
    public function index($id_jenjang, $kode_halaqah)
    {
        $date = date('Y-m-d');
        $santri = Santri::where("id_jenjang", $id_jenjang)->where("kode_halaqah", $kode_halaqah)->get();

        $data = [];

        foreach ($santri as $s) {

            $absen = Absensi::whereDate("created_at", $date)->where("id_santri", $s->id)->get();

            if ($absen->count() < 1) {
                return null;
            } else {
                foreach ($absen as $d) {
                    $data[] = [
                        'id_absensi' => $d->id,
                        'keterangan_absensi' => $d->keterangan,
                    ];
                }
            }
        }

        return response()->json($data);
    }

    public function create(Request $request, $id_jenjang, $kode_halaqah)
    {
        $date = date('Y-m-d');
        $santri = Santri::where("id_jenjang", $id_jenjang)->where("kode_halaqah", $kode_halaqah)->get();

        foreach ($santri as $s) {
            $absensi = Absensi::where("id_santri", $s->id)->whereDate("created_at", $date)->first();

            if ($absensi == null) {
                $absensi = new Absensi;
                $absensi->id_santri = $s->id;
                $absensi->id_status_absen = 1;
                $absensi->keterangan = "Hadir";
                $absensi->id_asatidz = Auth::user()->id;
                $absensi->save();

                return response()->json('Data berhasil disimpan', 200);
            }
        }

        return null;
    }

    public function edit($id, Request $request)
    {
        Absensi::where("id", $id)->update([
            "id_status_absen" => $request->id_status_absen,
            "keterangan" => "ok",
        ]);

        return response()->json('Data berhasil disimpan', 200);
    }

    public function get_status($id)
    {
        $date = date("Y-m-d");

        $absen = Absensi::where("id_santri", $id)->whereDate("created_at", $date)->first();

        if (!$absen) {
            return null;
        } else {
            $data = [
                "id_absensi" => $absen->id,
                "keterangan" => $absen->getStatusAbsenSantri->keterangan_absen
            ];
        }
        return response()->json($data);
    }
}
