<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            "data_role" => Role::orderBy("keterangan", "DESC")->get()
        ];

        return view("app.super_admin.role.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = Role::where("keterangan", $request->keterangan)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            Role::create($request->all());

            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Role::where("id", $request->id)->first()
        ];

        return view("app.super_admin.role.v_edit", $data);
    }

    public function update(Request $request)
    {
        $cek = Role::where("keterangan", $request->keterangan)->count();

        if ($cek > 0) {
            return redirect()->back();
        } else {
            Role::where("id", $request->id)->update([
                "keterangan" => $request->keterangan
            ]);

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Role::where("id", $id)->delete();

        return redirect()->back();
    }
}
