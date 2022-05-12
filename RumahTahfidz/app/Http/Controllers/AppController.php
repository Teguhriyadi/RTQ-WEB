<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asatidz;
use App\Models\Santri;
use App\Models\AdminLokasiRt;
use App\Models\Iuran;
use App\Models\SettingIuran;
use App\Models\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
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

    public function auto()
    {
        $iuran = SettingIuran::first();
        $bulan = date("m");
        $data_iuran = Iuran::whereMonth("tanggal", $bulan)->first();
        $data_santri = Santri::get();

        if (date("d") >= $iuran->mulai && date("d") <= $iuran->akhir) {
            if (empty($data_iuran)) {
                foreach ($data_santri as $d) {
                    $iuran = Iuran::whereMonth("tanggal", $bulan)->where("id_santri", $d->id)->first();
                    if (empty($iuran)) {
                        Iuran::create([
                            "id_santri" => $d->id,
                            "nominal" => 0,
                            "tanggal" => date(now()),
                            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
                            "id_status_validasi" => 2,
                            "id_users" => 7,
                            "created_at" => "2022-05-10 15:15:15",
                            "updated_at" => "2022-05-10 15:15:15"
                        ]);
                    } else {
                        echo "Ada";
                        echo "<br>";
                    }
                }
            } else {
                foreach ($data_santri as $d) {
                    $iuran = Iuran::where("id_santri", $d->id)->first();

                    if (empty($iuran)) {
                        Iuran::create([
                            "id_santri" => $d->id,
                            "nominal" => 0,
                            "tanggal" => date(now()),
                            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
                            "id_status_validasi" => 2,
                            "id_users" => 7,
                            "created_at" => "2022-05-10 15:15:15",
                            "updated_at" => "2022-05-10 15:15:15"
                        ]);
                    } else {
                        echo "Ada Data";
                        echo "<br>";
                    }
                }
            }
        } else {
            foreach ($data_santri as $d) {
                Iuran::create([
                    "id_santri" => $d->id,
                    "nominal" => 0,
                    "tanggal" => date(now()),
                    "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
                    "id_status_validasi" => 2,
                    "id_users" => 7,
                    "created_at" => "2022-05-10 15:15:15",
                    "updated_at" => "2022-05-10 15:15:15"
                ]);
            }
        }
    }
}
