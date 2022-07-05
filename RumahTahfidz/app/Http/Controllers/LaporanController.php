<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiAsatidz;
use App\Models\Asatidz;
use App\Models\KelasHalaqah;
use App\Models\Santri;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporan_absensi_santri()
    {
        $halaqah = KelasHalaqah::where("id_asatidz", Auth::user()->id)->where("status", 1)->first();

        $data = [
            "data_santri" => Santri::where("kode_halaqah", $halaqah->kode_halaqah)->get()
        ];

        return view("app.public.laporan.absensi.asatidz.v_index", $data);
    }

    public function laporan_absensi_asatidz()
    {
        $data = [
            "data_asatidz" => Asatidz::paginate(10)
        ];

        return view("app.public.laporan.absensi.asatidz.v_index", $data);
    }

    public function filter_laporan_asatidz(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();

        // $counter = Asatidz::selectRaw('year(created_at) as tahun')->distinct()->get();
        $data = [
            "data_asatidz" => Asatidz::whereBetween("created_at", [$tanggal_awal, $tanggal_akhir])->distinct()->get()
        ];

        $data["tanggal_awal"] = $tanggal_awal;
        $data["tanggal_akhir"] = $tanggal_akhir;

        return view("app.public.laporan.absensi.asatidz.v_index", $data);
    }

    public function detail_laporan_absensi_asatidz($id)
    {
        $data['asatidz'] = User::findOrFail($id);
        $data['absensi'] = AbsensiAsatidz::where('id_asatidz', $data['asatidz']->id)->latest()->paginate(4);
        return view('app.public.laporan.absensi.asatidz.v_detail', $data);
    }
}
