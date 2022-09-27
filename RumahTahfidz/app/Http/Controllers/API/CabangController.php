<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\LokasiRt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CabangController extends Controller
{
    public function view()
    {
        $halaqah = Halaqah::get();

        if ($halaqah->count() < 1) {
            $data = "Data tidak ada.";
        } else {
            $data = [];
            foreach ($halaqah as $h) {
                $lokasi_rt = LokasiRt::where('kode_rt', $h->kode_rt)->first();
                $data[] = [
                    'kode_halaqah' => $h->kode_halaqah,
                    'nama_tempat' => $h->nama_halaqah,
                    'nama_daerah' => $lokasi_rt->lokasi_rt,
                ];
            }
        }

        return response()->json($data, 200);
    }
}
