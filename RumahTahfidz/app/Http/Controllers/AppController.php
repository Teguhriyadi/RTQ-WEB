<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asatidz;
use App\Models\Santri;
use App\Models\AdminLokasiRt;

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
            "user_login" => TerakhirLogin::where("id_user", auth()->user()->id)->get()
        ];

        return view("app.administrator.v_home", $data);
    }
}
