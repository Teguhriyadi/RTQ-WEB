<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\Santri;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function belum_lunas()
    {
        $data = [
            "data_santri" => Administrasi::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Administrasi::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.biaya_administrasi.v_belum_lunas", $data, compact('count'));

        // foreach ($data["data_santri"] as $d) {
        //     $administrasi = Administrasi::where("id_santri", $d->id_santri)->get();

        //     $data_total = 0;
        //     foreach ($administrasi as $a) {
        //         $data_total += $a->nominal;
        //     }

        //     $santri = Santri::where("id", $d->id_santri)->first();

        //     echo $santri->getNominalIuran->nominal - $data_total;
        // }


    }
}
