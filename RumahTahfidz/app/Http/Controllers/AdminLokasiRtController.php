<?php

namespace App\Http\Controllers;

use App\Models\AdminLokasiRt;
use App\Models\HakAkses;
use App\Models\LokasiRt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLokasiRtController extends Controller
{
    public function automatis()
    {
        $max = LokasiRt::max('kode_rt');
        $urutan = (int) substr($max, 4, 3);
        $urutan++;

        $huruf = 'RTQ-';
        $hasil = $huruf . sprintf('%03s', $urutan);

        return $hasil;
    }

    public function index()
    {
        $data = [
            "data_admin_lokasi_rt" => AdminLokasiRt::get()
        ];

        return view("app.super_admin.data_master.admin_lokasi_rt.v_index", $data);
    }

    public function create()
    {
        $data = [
            "data_lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.admin_lokasi_rt.v_create", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "no_hp" => "required|numeric",
            "alamat" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "jenis_kelamin" => "required",
            "gambar" => "required|image|mimes:jpeg,png,jpg,gif,svg",
        ]);

        if ($request->kode_input) {
            LokasiRt::create([
                "kode_rt" => $this->automatis(),
                "lokasi_rt" => $request->kode_input
            ]);

            $lokasi = LokasiRt::max("kode_rt");
        } else if ($request->input_kode_rt) {
            LokasiRt::create([
                "kode_rt" => $this->automatis(),
                "lokasi_rt" => $request->input_kode_rt
            ]);

            $lokasi = LokasiRt::max("kode_rt");
        } else if ($request->kode_rt) {
            $lokasi = $request->kode_rt;
        }

        $cek = User::where("no_hp", $request->no_hp)->count();

        if ($cek > 0) {
            $detail = User::where("no_hp", $request->no_hp)->first();

            $cek_admin = AdminLokasiRt::where("id", $detail->id)->count();

            if ($cek_admin > 0) {
                return back()->with("message", "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error')</script>")->withInput();
            } else {
                AdminLokasiRt::create([
                    "id" => $detail->id,
                    "kode_rt" => $lokasi
                ]);

                HakAkses::create([
                    "id_user" => $detail->id,
                    "id_role" => 2
                ]);
            }

        } else {
            if ($request->file("gambar")) {
                $data = $request->file("gambar")->store("admin_cabang");
            }

            $user = new User;

            $user->nama = $request->nama;

            $user->email = $request->email;
            $user->password = bcrypt("admin" . $request->no_hp);
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->no_hp = $request->no_hp;
            $user->gambar = url('storage/' . $data);
            $user->save();

            $hak_akses = new HakAkses;

            $hak_akses->id_user = $user->id;
            $hak_akses->id_role = 2;

            $hak_akses->save();

            User::where("id", $user->id)->update([
                "id_hak_akses" => $hak_akses->id
            ]);

            $admin_lokasi_rt = new AdminLokasiRt;

            $admin_lokasi_rt->id = $user->id;

            $admin_lokasi_rt->pendidikan_terakhir = $request->pendidikan_terakhir;
            $admin_lokasi_rt->kode_rt = $lokasi;
            $admin_lokasi_rt->save();
        }

        return redirect("/app/sistem/admin_cabang")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan!', 'success')</script>")->withInput();
    }

    public function edit($id)
    {
        $data = [
            "edit" => AdminLokasiRt::where("id", decrypt($id))->first(),
            "lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.data_master.admin_lokasi_rt.v_edit", $data);
    }

    public function update($id, Request $request)
    {
        if ($request->edit_lokasi_rt) {

            $lokasi = new LokasiRt;

            $lokasi->kode_rt = $this->automatis();
            $lokasi->lokasi_rt = $request->edit_lokasi_rt;

            $lokasi->save();

            $lokasi = LokasiRt::max("kode_rt");
        } else if ($request->edit_pilihan) {
            $lokasi = $request->edit_pilihan;
        }

        $this->validate($request, [
            "nama" => "required",
            "no_hp" => "required|numeric",
            "alamat" => "required",
            "tanggal_lahir" => "required",
            "tempat_lahir" => "required",
            "jenis_kelamin" => "required",
            "gambar" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        AdminLokasiRt::where("id", decrypt($id))->update([
            "pendidikan_terakhir" => $request->pendidikan_terakhir,
            "kode_rt" => $lokasi
        ]);

        if (empty($request->email)) {
            $email = NULL;
        } else {
            $email = $request->email;
        }

        if ($request->file("gambar")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $nama_gambar = $request->file("gambar")->store("admin_cabang");

            $data = url('/storage/' . $nama_gambar);
        } else {
            $data = url('') . "/storage/" . $request->gambarLama;
        }

        User::where("id", decrypt($id))->update([
            "nama" => $request->nama,
            "email" => $email,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "gambar" => $data
        ]);

        return redirect("/app/sistem/admin_cabang")->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>");
    }

    public function destroy($id)
    {
        AdminLokasiRt::where("id", $id)->delete();

        User::where("id", $id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus!', 'success')</script>");
    }
}
