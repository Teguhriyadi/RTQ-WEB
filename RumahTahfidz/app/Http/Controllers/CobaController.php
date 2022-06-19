<?php

namespace App\Http\Controllers;

use App\Models\AbsensiAsatidz;
use App\Models\Data;
use App\Models\Image;
use App\Models\Iuran;
use App\Models\KategoriPelajaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobaController extends Controller
{
    public function json(Request $request)
    {
        $data = KategoriPelajaran::where("id", 2)->first();

        $read = array('id' => $data["id"]);
        echo json_encode($read);
    }

    public function coba(Request $request)
    {
        $uploadPath = 
        $image = $request->image->getClientOriginalName();
        Data::create([
            "nama" => $uploadPath . $image
        ]);

        return back();
    }

    public function coba_rekap()
    {
        return view("app.coba_rekap");
    }

    public function post_rekap(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();

        $counter = Iuran::selectRaw('year(created_at) as tahun')->distinct()->get();
        $data = [
            "data_coba" => Iuran::whereBetween("tanggal", [$tanggal_awal, $tanggal_akhir])->selectRaw('id_santri as santri_id')->distinct()->get()
        ];

        return view("app.coba_rekap", $data);
    }
}
