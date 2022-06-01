<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\Quran;
use Illuminate\Http\Request;

class HafalanAsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_index", $data);
    }

    public function show($id)
    {
        $data = [
            "data_hafalan_asatidz" => Quran::where("id_asatidz", $id)->get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_detail", $data);
    }
}
