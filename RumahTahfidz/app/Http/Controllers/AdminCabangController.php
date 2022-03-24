<?php

namespace App\Http\Controllers;

use App\Models\AdminCabang;
use App\Models\Cabang;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $data = [
            "data_admin_cabang" => AdminCabang::orderBy("id", "ASC")->get(),
            "data_cabang" => Cabang::count()
        ];

        return view("app.super_admin.admin_cabang.v_index", $data);
    }
}
