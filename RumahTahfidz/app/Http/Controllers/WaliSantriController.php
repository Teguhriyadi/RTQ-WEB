<?php

namespace App\Http\Controllers;

use App\Models\AdminLokasiRt;
use App\Models\HakAkses;
use App\Models\Halaqah;
use App\Models\LokasiRt;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class WaliSantriController extends Controller
{
    public function index()
    {
        if (Auth::user()->getAkses->getRole->id == 1) {
            $data_halaqah = Halaqah::get();
        } else {
            $data_halaqah = Halaqah::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->get();
        }
        $data = [
            "data_santri" => Santri::get(),
            "data_halaqah" => $data_halaqah
        ];

        return view("app.public.wali_santri.v_index", $data);
    }

    public function create()
    {
        return view("app.public.wali_santri.v_create");
    }

    public function store(Request $request)
    {
        if ($request->file("gambar")) {
            $file = $request->file("gambar")->store("wali_santri");
        }
        $this->validate($request, [
            "nama" => "required",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "pekerjaan" => "required",
            "gambar" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $id_otomatis = HakAkses::max("id") + 1;

        $user = new User;

        $user->nama = $request->nama;

        if (empty($request->email)) {
            $email = NULL;
        } else {
            $email = $request->email;
        }

        $user->email = $email;
        $user->password = bcrypt("walisantri" . $request->no_hp);
        $user->alamat = $request->alamat;
        $user->id_hak_akses = $id_otomatis;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->gambar = url('storage/' . $file);
        $user->save();

        $hak_akses = new HakAkses;

        $hak_akses->id = $id_otomatis;
        $hak_akses->id_user = $user->id;
        $hak_akses->id_role = 4;

        $hak_akses->save();

        User::where("id", $user->id)->update([
            "id_hak_akses" => $hak_akses->id
        ]);

        $walisantri = new WaliSantri;

        $walisantri->id = $user->id;

        if (empty($request->no_ktp)) {
            $no_ktp = NULL;
        } else {
            $no_ktp = $request->no_ktp;
        }

        $walisantri->no_ktp = $no_ktp;

        if (empty($request->no_kk)) {
            $no_kk = NULL;
        } else {
            $no_kk = $request->no_kk;
        }

        $walisantri->no_kk = $no_kk;
        $walisantri->pekerjaan = $request->pekerjaan;

        $walisantri->save();

        return redirect("/app/sistem/wali_santri")->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan!", "success");</script>')->withInput();
    }

    public function edit($id)
    {
        $data = [
            "edit" => WaliSantri::where("id", $id)->first(),
            "data_halaqah" => Halaqah::get()
        ];

        return view("app.public.wali_santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "email" => "required|email",
            "alamat" => "required",
            "no_hp" => "required",
            "tanggal_lahir" => "required",
            "jenis_kelamin" => "required",
            "tempat_lahir" => "required",
            "no_ktp" => "required",
            "no_kk" => "required",
            "kode_halaqah" => "required",
            "pekerjaan" => "required"
        ]);

        if ($request->file("gambar")) {
            if ($request->gambar_lama) {
                $string = str_replace(url('storage/'), "", $request->gambar_lama);

                Storage::delete($string);
            }

            $data = $request->file("gambar")->store("wali_santri");
            $data = url('storage/' . $data);
        } else {
            $data = $request->gambar_lama;
        }

        WaliSantri::where("id", $request->id)->update([
            "no_ktp" => $request->no_ktp,
            "no_kk" => $request->no_kk,
            "kode_halaqah" => $request->kode_halaqah,
            "pekerjaan" => $request->pekerjaan
        ]);

        User::where("id", $request->id)->update([
            "nama" => $request->nama,
            "email" => $request->email,
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "gambar" => $data
        ]);

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Simpan!", "success");</script>');
    }

    public function destroy($id)
    {
        $user = User::where("id", $id)->first();

        WaliSantri::where("id", $id)->delete();

        $santri = Santri::where('id_wali', $id)->first();

        $string = str_replace(url('storage/'), "", $user->gambar);
        Storage::delete($string);

        $string2 = str_replace(url('storage/'), "", $santri->foto);
        Storage::delete($string2);

        $santri->delete();
        $user->delete();

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Hapus", "success");</script>');
    }

    public function datatables()
    {
        if (Auth::user()->getAkses->getRole->id == 1) {
            $walisantri = WaliSantri::get();
            $santri = Santri::where("status", 1)->get();
        } else {
            if (WaliSantri::count() < 1) {
                $walisantri = WaliSantri::get();
            } else {
                $count = WaliSantri::get();

                $santri = Santri::where("id_jenjang", "!=", NULL)->where("status", 1)->get();
                $user = AdminLokasiRt::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->first();

                $walisantri = WaliSantri::get();
            }
        }

        $data = array();
        foreach ($walisantri as $user) {

            if (empty($user->no_kk)) {
                $no_kk = "-";
            } else {
                $no_kk = $user->no_kk;
            }

            if ($user->getUser->jenis_kelamin == "L") {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }

            $data[] = [
                'id' => $user->id,
                'no_kk' => $no_kk,
                'nama_lengkap' => $user->getUser->nama,
                'jenis_kelamin' => $jk,
                'no_hp' => $user->getUser->no_hp,
                'jumlah_anak' => $santri->where('id_wali', $user->id)->count(),
            ];
        }

        return DataTables::of($data)

            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                if (Auth::user()->getAkses->getRole->id == 1) {
                    $aksiBtn = '-';
                } else {

                    $aksiBtn = '<a href="' . url('/app/sistem/wali_santri/create/anak/' . $row["id"]) . '" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah </a>';
                    $aksiBtn .= '<a href="' . url("/app/sistem/wali_santri/" . $row["id"]) . '/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit </a>';
                    $aksiBtn .= '<form action="' . url("/app/sistem/wali_santri/" . $row["id"]) . '"
                                method="POST" style="display: inline;">
                                ' . method_field('delete') . '
                                ' . csrf_field() . '
                                <input type="hidden" name="id" value="' . $row["id"] . '">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>';
                }
                return $aksiBtn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function kode_otomatis()
    {
        $max = Halaqah::max('kode_halaqah');
        $urutan = (int) substr($max, 2);
        $urutan++;
        $huruf = 'HLQ-';
        $hasil = $huruf . sprintf('%03s', $urutan);

        return $hasil;
    }
}
