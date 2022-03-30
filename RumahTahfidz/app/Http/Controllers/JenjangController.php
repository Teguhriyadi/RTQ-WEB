<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $data = [
            "data_jenjang" => Jenjang::orderBy("jenjang", "DESC")->get()
        ];

        return view("app.super_admin.jenjang.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            Jenjang::create($request->all());

            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Jenjang::where("id", $request->id)->first()
        ];

        return view("app.super_admin.jenjang.v_edit", $data);
    }

    public function update(Request $request)
    {
        $cek = Jenjang::where("jenjang", $request->jenjang)->count();

        if ($cek > 0 ) {
            return redirect()->back();
        } else {
            Jenjang::where("id", $request->id)->update([
                "jenjang" => $request->jenjang
            ]);

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Jenjang::where("id", $id)->delete();

        return redirect()->back();
    }
}
