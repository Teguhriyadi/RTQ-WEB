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
        Role::create($request->all());

        return redirect()->back()->with('message', "<script>swal('Selamat!', 'Alamat Berhasil Ditambahkan', 'success')</script>");
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
        Role::where("id", $request->id)->update([
            "keterangan" => $request->keterangan
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Role::where("id", $id)->delete();

        return redirect()->back();
    }
}
