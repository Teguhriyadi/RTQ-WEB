<?php

namespace App\Http\Controllers\Public\Setting\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\StatusValidasi;
use Illuminate\Http\Request;

class StatusValidasiController extends Controller
{
    public function index()
    {
        $data["status"] = StatusValidasi::get();

        return view("app.public.pengaturan.status_validasi.v_index", $data);
    }

    public function store(Request $request)
    {
        StatusValidasi::create($request->all());

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data["edit"] = StatusValidasi::where("id", $request->id)->first();

        return view("app.public.pengaturan.status_validasi.v_edit", $data);
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
