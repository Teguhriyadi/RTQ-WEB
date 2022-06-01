<?php

namespace App\Http\Controllers;

use App\Models\Quran;
use Illuminate\Http\Request;

class HafalanAsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_hafalan_asatidz" => Quran::get()
        ];

        return view("app.super_admin.hafalan_asatidz.v_index", $data);
    }
}
