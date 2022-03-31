<?php

namespace App\Http\Controllers;

use App\Models\AdminCabang;
use App\Models\Cabang;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCabangController extends Controller
{
    public function index()
    {
        $data = [
            "data_admin_cabang" => AdminCabang::orderBy("id", "ASC")->get(),
            "data_cabang" => Cabang::count(),
            "cabang" => Cabang::orderBy("id", "ASC")->get()
        ];

        return view("app.super_admin.admin_cabang.v_index", $data);
    }

    public function store(Request $request)
    {

        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("admin_cabang");
        }

        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt("admincabang");
        $user->alamat = $request->alamat;
        $user->id_role = 2;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->gambar = $data;
        $user->save();

        $admin_cabang = new AdminCabang;

        $admin_cabang->id = $user->id;
        $admin_cabang->pendidikan_terakhir = $request->pendidikan_terakhir;
        $admin_cabang->id_cabang = $request->id_cabang;
        $admin_cabang->save();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => AdminCabang::where("id", $request->id)->first(),
            "cabang" => Cabang::orderBy("id", "ASC")->get()
        ];

        return view("app.super_admin.admin_cabang.v_edit", $data);
    }

    public function update(Request $request)
    {
        AdminCabang::where("id", $request->id)->update([
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "id_cabang" => $request->id_cabang
        ]);

        User::where("id", $request->id)->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>");
    }

    public function destroy($id)
    {
        AdminCabang::where("id", $id)->delete();

        User::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }
}
