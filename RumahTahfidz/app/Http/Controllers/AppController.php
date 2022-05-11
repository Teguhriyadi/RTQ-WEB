<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asatidz;
use App\Models\Santri;
use App\Models\AdminLokasiRt;
use App\Models\Iuran;
use App\Models\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function layouts()
    {
        return view("app.administrator.layouts.template");
    }

    public function home()
    {
        $data = [
            "jumlah_user" => User::count(),
            "jumlah_asatidz" => Asatidz::count(),
            "jumlah_santri" => Santri::count(),
            "jumlah_admin_lokasi_rt" => AdminLokasiRT::count(),
            "user_login" => TerakhirLogin::where("id_user", auth()->user()->id)->get(),
            "data_santri" => Santri::get()
        ];

        return view("app.administrator.v_home", $data);
    }

    // public function auto()
    // {
    //     // Iuran::create([
    //     //     "id_santri" => 100,
    //     //     "tanggal" => "2022-06-11",
    //     //     "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
    //     //     "status_validasi" => 3,
    //     //     "id_users" => 8
    //     // ]);
    //     $bulan = date("m");
    //     $data_iuran = Iuran::whereMonth("tanggal", $bulan)->get();
    //     $santri = Santri::get();
    //     foreach ($santri as $data) {
    //         $iuran = Iuran::whereMonth("tanggal", $bulan)->where("id_santri", $data->id)->first();

    //         echo $iuran;
    //     }
    // }
}
