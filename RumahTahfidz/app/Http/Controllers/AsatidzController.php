<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\User;
use Illuminate\Http\Request;

class AsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::orderBy("id", "DESC")->get()
        ];

        return view("app.administrator.asatidz.v_index", $data);
    }

    public function create()
    {
        return view("app.administrator.asatidz.v_tambah");
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt("asatidz");
        $user->alamat = $request->alamat;
        $user->id_role = 3;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->save();

        $asatidz = new Asatidz;

        $asatidz->id = $user->id;
        $asatidz->nomor_induk = $request->nomor_induk;
        $asatidz->no_ktp = $request->no_ktp;
        $asatidz->pendidikan_terakhir = $request->pendidikan_terakhir;
        $asatidz->aktivitas_utama = $request->aktivitas_utama;
        $asatidz->motivasi_mengajar = $request->motivasi_mengajar;
        $asatidz->save();

        return redirect("/app/sistem/asatidz")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Asatidz::where("id", $request->id)->first()
        ];

        return view("app.administrator.asatidz.v_edit", $data);
    }

    public function update(Request $request)
    {
        Asatidz::where("id", $request->id)->update([
            "nomor_induk" => $request->nomor_induk,
            "no_ktp" => $request->no_ktp,
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "aktivitas_utama" => $request->aktivitas_utama,
            "motivasi_mengajar" => $request->motivasi_mengajar
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

        return redirect("/app/sistem/asatidz")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>");
    }

    public function destroy($id)
    {
        Asatidz::where("id", $id)->delete();

        User::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }
}
