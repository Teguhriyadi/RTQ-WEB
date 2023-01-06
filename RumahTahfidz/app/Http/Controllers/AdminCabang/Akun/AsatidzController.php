<?php

namespace App\Http\Controllers\AdminCabang\Akun;

use App\Http\Controllers\Controller;
use App\Models\Asatidz;
use App\Models\HakAkses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsatidzController extends Controller
{
    public function index()
    {
        $data = [
            "data_asatidz" => Asatidz::orderBy("created_at", "DESC")->get()
        ];

        return view("app.public.asatidz.v_index", $data);
    }

    public function create(Request $request)
    {
        $data = [
            "detail" => User::where("id", $request->id_user)->first(),
            "data_user" => User::where("status", 1)->get()
        ];

        return view("app.public.asatidz.v_tambah", $data);
    }

    public function store(Request $request)
    {
        $cek = User::where("no_hp", $request->no_hp)->count();

        if ($cek > 0) {
            $detail = User::where("no_hp", $request->no_hp)->first();

            if (empty($detail)) {
                Asatidz::create([
                    "id" => $detail->id,
                    "nomor_induk" => $request->nomor_induk
                ]);

                HakAkses::create([
                    "id_user" => $detail->id,
                    "id_role" => 3
                ]);
            } else {
                return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>");
            }

        } else {
            if ($request->gambar) {
                $data = $request->file("gambar")->store("asatidz");
            }

            $user = new User;

            $user->nama = $request->nama;

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
        }

        return redirect("/app/sistem/asatidz")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>");
    }

    public function show($id)
    {
        $data["detail"] = Asatidz::where("id", decrypt($id))->first();

        return view("app.public.asatidz.v_detail", $data);
    }

    public function edit($id)
    {
        $data = [
            "edit" => Asatidz::where("id", decrypt($id))->first()
        ];

        return view("app.public.asatidz.v_edit", $data);
    }

    public function update(Request $request)
    {
        if ($request->file("gambar")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("gambar")->store("asatidz");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
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
