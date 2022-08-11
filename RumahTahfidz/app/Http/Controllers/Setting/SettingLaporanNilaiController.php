<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\SettingLaporanNilai;
use Illuminate\Http\Request;

class SettingLaporanNilaiController extends Controller
{
    public function store(Request $request)
    {
        SettingLaporanNilai::create($request->all());

        return back();
    }

    public function update(Request $request, $id)
    {
        SettingLaporanNilai::where("id", decrypt($id))->update([
            "setting_nama" => $request->setting_nama,
            "setting_nilai" => $request->setting_nilai,
            "setting_status" => $request->setting_status
        ]);

        return back();
    }
}
