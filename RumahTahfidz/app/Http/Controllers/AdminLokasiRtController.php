<?php

namespace App\Http\Controllers;

use App\Models\AdminLokasiRt;
use App\Models\LokasiRt;
use App\Models\User;
use Illuminate\Http\Request;

class AdminLokasiRtController extends Controller
{
    public function index()
    {
        $data = [
            "data_admin_lokasi_rt" => AdminLokasiRt::latest()->get(),
            "data_lokasi_rt" => LokasiRt::count(),
            "lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.admin_lokasi_rt.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "email" => "required|email|unique:users",
            "no_hp" => "required|numeric|unique:users",
            "alamat" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "jenis_kelamin" => "required",
            "pendidikan_terakhir" => "required",
            "kode_rt" => "required",
            "gambar" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        if ($request->inputKodeRt) {
            LokasiRt::create([
                "kode_rt" => "500",
                "lokasi_rt" => $request->inputKodeRt
            ]);
        }

        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("admin_cabang");
        }

        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt("adminlokasirt");
        $user->alamat = $request->alamat;
        $user->id_hak_akses = 2;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->gambar = $data;
        $user->save();

        $admin_lokasi_rt = new AdminLokasiRt;

        $admin_lokasi_rt->id = $user->id;
        $admin_lokasi_rt->pendidikan_terakhir = $request->pendidikan_terakhir;
        $admin_lokasi_rt->kode_rt = $request->kode_rt;
        $admin_lokasi_rt->save();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => AdminLokasiRt::where("id", $request->id)->first(),
            "lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.admin_lokasi_rt.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "email" => "required|email",
            "no_hp" => "required|numeric",
            "alamat" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "jenis_kelamin" => "required",
            "pendidikan_terakhir" => "required",
            "kode_rt" => "required",
            "gambar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        AdminLokasiRt::where("id", $request->id)->update([
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "kode_rt" => $request->kode_rt
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
        AdminLokasiRt::where("id", $id)->delete();

        User::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }
}
