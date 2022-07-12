<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\Quran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HafalanAsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::whereYear("created_at", date("Y"))->get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "id_asatidz" => "required",
            "ayat_awal" => "required",
            "ayat_akhir" => "required",
            "keterangan" => "required",
        ]);
        Quran::create([
            "id_asatidz" => $request->id,
            "quran_awal" => $request->ayat_awal,
            "quran_akhir" => $request->ayat_akhir,
            "keterangan" => $request->keterangan
        ]);

        return back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function show($id)
    {
        $data = [
            "detail" => Asatidz::where("id", $id)->first(),
            "data_hafalan_asatidz" => Quran::where("id_asatidz", $id)->get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_detail", $data);
    }

    public function filter_tanggal(Request $request)
    {
        $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
        $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();

        $data = [
            "data_asatidz" => Asatidz::whereBetween("created_at", [$tanggal_awal, $tanggal_akhir])->whereYear("created_at", date("Y"))->get()
        ];

        $data["tanggal_awal"] = $tanggal_awal;
        $data["tanggal_akhir"] = $tanggal_akhir;

        return view("app.super_admin.hafalan_asatidz.v_index", $data);
    }
}
