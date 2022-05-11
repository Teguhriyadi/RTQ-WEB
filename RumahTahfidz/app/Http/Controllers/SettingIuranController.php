<?php

namespace App\Http\Controllers;

use App\Models\SettingIuran;
use Illuminate\Http\Request;

class SettingIuranController extends Controller
{
    public function index()
    {
        $data = [
            "data" => SettingIuran::select("id", "mulai", "akhir")->first()
        ];

        return view("app.super_admin.settings.iuran.v_index", $data);
    }

    public function store(Request $request)
    {
        SettingIuran::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        SettingIuran::where("id", $id)->update([
            "mulai" => $request->mulai,
            "akhir" => $request->akhir
        ]);

        return redirect()->back();
    }
}
