<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use Carbon\Carbon;
use Illuminate\Http\Request;


class GenerateAsatidzController extends Controller
{
    public function index()
    {
        return view("app.super_admin.generate.asatidz.v_index");
    }

    // public function show(Request $request)
    // {
    //     $tanggal_awal = Carbon::parse($request->tanggal_awal)->toDateString();
    //     $tanggal_akhir = Carbon::parse($request->tanggal_akhir)->toDateString();

    //     $counter = Asatidz::selectRaw('year(created_at) as tahun')->distinct()->get();
    //     $data = [
    //         "data_asatidz" => Asatidz::whereBetween("")->selectRaw('id_asatidz as asatidz_id')->distinct()->get()
    //     ];

    //     $data["tanggal_awal"] = $tanggal_awal;
    //     $data["tanggal_akhir"] = $tanggal_akhir;

    //     return view("app.super_admin.generate.iuran.v_index", $data);
    // }
}
