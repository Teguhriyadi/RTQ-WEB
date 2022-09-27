<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Absensi;
use App\Models\AbsensiAsatidz;
use Illuminate\Support\Facades\Auth;

class AbsensiAsatidzController extends Controller
{
    public function index()
    {
        $tanggal = date("Y-m-d");

        $cek = AbsensiAsatidz::where("id_asatidz", Auth::user()->id)->whereDate("created_at", $tanggal)->first();

        if ($cek) {
            $data = [
                "id" => $cek->id,
                "gambar" => $cek->gambar,
                "alamat" => $cek->alamat,
                "tanggal_absen" => $cek->created_at
            ];
            return response()->json($data);
        } else {
            return [];
        }
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required',
            'alamat' => 'required'
        ]);

        $asatidz = Str::random(32);

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('assets/absensi/asatidz/' . date('Y_m_d'), $asatidz);
            AbsensiAsatidz::create([
                'gambar' => url() . '/assets/absensi/asatidz/' . date('Y_m_d') . '/' . $asatidz,
                'alamat' => $request->alamat,
                'id_asatidz' => $request->id_asatidz,
            ]);
            return response()->json(['message' => 'Data success'], 201);
            // imagejpeg()
        } else {
            return response()->json('Image is required!', 401);
        }
    }

    public function rekap()
    {
        $cek = AbsensiAsatidz::get();

        $data = [];

        foreach ($cek as $d) {
            $data[] = [
                "id" => $d->id,
                "gambar" => $d->gambar,
                "alamat" => $d->alamat,
                "tanggal_absen" => $d->created_at,
            ];
        }

        return response()->json($data, 200);
    }
}
