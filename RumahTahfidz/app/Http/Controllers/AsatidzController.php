<?php

namespace App\Http\Controllers;

use App\Models\Asatidz;
use App\Models\HakAkses;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::orderBy("id", "DESC")->get()
        ];

        return view("app.public.asatidz.v_index", $data);
    }

    public function create()
    {
        return view("app.public.asatidz.v_tambah");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "nomor_induk" => "required",
        ]);

        if ($request->gambar) {
            $data = $request->file("gambar")->store("asatidz");
        }

        $user = new User;

        $user->nama = $request->nama;

        if (empty($request->email)) {
            $email = NULL;
        } else {
            $email = $request->email;
        }
        $user->email = $email;
        $user->password = bcrypt("asatidz" . $request->no_hp);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->gambar = url("storage/" . $data);
        $user->save();

        $hak_akses = new HakAkses;

        $hak_akses->id_user = $user->id;
        $hak_akses->id_role = 3;
        $hak_akses->save();

        User::where("id", $user->id)->update([
            "id_hak_akses" => $hak_akses->id
        ]);

        $asatidz = new Asatidz;

        $asatidz->id = $user->id;
        $asatidz->nomor_induk = $request->nomor_induk;

        if (empty($request->no_ktp)) {
            $no_ktp = NULL;
        } else {
            $no_ktp = $request->no_ktp;
        }
        $asatidz->no_ktp = $no_ktp;

        if (empty($request->pendidikan_terakhir)) {
            $pendidikan_terakhir = NULL;
        } else {
            $pendidikan_terakhir = $request->pendidikan_terakhir;
        }

        $asatidz->pendidikan_terakhir = $pendidikan_terakhir;

        if (empty($request->aktivitas_utama)) {
            $aktivitas_utama = NULL;
        } else {
            $aktivitas_utama = $request->aktivitas_utama;
        }
        $asatidz->aktivitas_utama = $aktivitas_utama;

        if (empty($request->motivasi_mengajar)) {
            $motivasi_mengajar = NULL;
        } else {
            $motivasi_mengajar = $request->motivasi_mengajar;
        }

        $asatidz->motivasi_mengajar = $motivasi_mengajar;

        $asatidz->save();

        return redirect("/app/sistem/asatidz")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Asatidz::where("id", $request->id)->first()
        ];

        return view("app.public.asatidz.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "nomor_induk" => "required",
        ]);

        if ($request->file("gambar")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("gambar")->store("asatidz");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        if (empty($request->no_ktp)) {
            $no_ktp = NULL;
        } else {
            $no_ktp = $request->no_ktp;
        }

        if (empty($request->pendidikan_terakhir)) {
            $pendidikan_terakhir = NULL;
        } else {
            $pendidikan_terakhir = $request->pendidikan_terakhir;
        }

        if (empty($request->aktivitas_utama)) {
            $aktivitas_utama = NULL;
        } else {
            $aktivitas_utama = $request->aktivitas_utama;
        }

        if (empty($request->motivasi_mengajar)) {
            $motivasi_mengajar = NULL;
        } else {
            $motivasi_mengajar = $request->motivasi_mengajar;
        }

        Asatidz::where("id", $request->id)->update([
            "nomor_induk" => $request->nomor_induk,
            "no_ktp" => $no_ktp,
            "pendidikan_terakhir" => $pendidikan_terakhir,
            "aktivitas_utama" => $aktivitas_utama,
            "motivasi_mengajar" => $motivasi_mengajar
        ]);

        if (empty($request->email)) {
            $email = NULL;
        } else {
            $email = $request->email;
        }

        User::where("id", $request->id)->update([
            "nama" => $request->nama,
            "email" => $email,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "gambar" => $data
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
