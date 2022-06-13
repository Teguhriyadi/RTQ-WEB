<?php

namespace App\Http\Controllers;

use App\Models\StatusValidasi;
use Illuminate\Http\Request;

class StatusValidasiController extends Controller
{
    public function index()
    {
        $data = [
            "data_status" => StatusValidasi::get()
        ];

        return view("app.super_admin.settings.status_validasi.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "status" => "required"
        ]);

        StatusValidasi::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => StatusValidasi::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.status_validasi.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "status" => "required"
        ]);

        StatusValidasi::where("id", $request->id)->update([
            "status" => $request->status
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        StatusValidasi::where("id", $id)->delete();

        return redirect()->back();
    }
}
