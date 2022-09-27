<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Iuran;
use App\Models\Santri;
use Illuminate\Http\Request;

class IuranController extends Controller
{

    public function detail($id)
    {
        $iuran = Iuran::where('id_santri', $id)->get();

        $data = [];

        foreach ($iuran as $i) {
            $data[] = [
                'tanggal_pembayaran' => $i->tanggal,
                'nominal_pembayaran' => $i->nominal,
                'status_pembayaran' => $i->getStatusValidasi->status
            ];
        }

        return response()->json($data, 200);
    }

    public function cekNominal($id_santri)
    {
        $santri = Iuran::where('id_santri', $id_santri)->first();

        return response()->json(['nominal' => $santri->nominal], 200);
    }

    public function store(Request $request)
    {
        $cek = Iuran::create([
            'nominal' => $request->nominal,
            'id_santri' => $request->id_santri,
            'id_users' => $request->id_asatidz,
            'bukti' => 'http://rtq-freelance.my.id/gambar/gambar_user.png',
            'id_status_validasi' => 2,
            'tanggal' => date('Y-m-d'),
        ]);

        if ($cek) {
            return response()->json('Data berhasil disimpan', 200);
        } else {
            return response()->json('Data gagal disimpan', 404);
        }
    }
}
