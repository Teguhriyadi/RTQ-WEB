<?php

namespace App\Http\Controllers;

use App\Models\StatusAbsen;
use Illuminate\Http\Request;

class StatusAbsenController extends Controller
{
    public function index()
    {
        $data = [
            "data_status" => StatusAbsen::orderBy("keterangan", "DESC")->get()
        ];

        return view("app.super_admin.status_absen.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = StatusAbsen::where("keterangan", $request->keterangan)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            StatusAbsen::create($request->all());

            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => StatusAbsen::where("id", $request->id)->first()
        ];

        return view("app.super_admin.status_absen.v_edit", $data);
    }

    public function update(Request $request)
    {
        $cek = StatusAbsen::where("keterangan", $request->keterangan)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            StatusAbsen::where("id", $request->id)->update([
                "keterangan" => $request->keterangan
            ]);

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        StatusAbsen::where("id", $id)->delete();

        return redirect()->back();
    }
}
