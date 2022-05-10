<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function validasi_admin_cabang()
    {
        $data = [
            "data_validasi" => Iuran::get()
        ];

        return view("app.administrator.iuran.v_index", $data);
    }
}
