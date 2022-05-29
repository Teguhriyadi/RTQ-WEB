<?php

namespace App\Http\Controllers;

use App\Models\AsatidzJenjang;
use Illuminate\Http\Request;

class AsatidzJenjangController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz_jenjang" => AsatidzJenjang::get()
        ];

        return view("app.super_admin.asatidz_jenjang.v_index", $data);
    }

    public function store(Request $request)
    {
        AsatidzJenjang::create($request->all());
    }
}
