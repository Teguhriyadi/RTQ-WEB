<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Illuminate\Http\Request;

class ValidasiIuranController extends Controller
{
    public function v_belum_lunas()
    {
        $data = [
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.belum_lunas.v_belum_lunas", $data, compact("count"));
    }

    public function v_lunas()
    {
        $data = [
            "data_santri" => Iuran::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Iuran::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.validasi.iuran.lunas.v_lunas", $data, compact("count"));
    }
}
