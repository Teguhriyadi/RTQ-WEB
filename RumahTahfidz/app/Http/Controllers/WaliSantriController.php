<?php

namespace App\Http\Controllers;

use App\Models\AdminLokasiRt;
use App\Models\Halaqah;
use App\Models\LokasiRt;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class WaliSantriController extends Controller
{
    public function index()
    {
        $data = [
            "data_wali" => WaliSantri::orderBy("id")->get(),
            "data_santri" => Santri::get(),
            "data_halaqah" => Halaqah::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->get()
        ];

        return view("/app/administrator/wali_santri/v_index", $data);
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt("walisantri" . $request->no_hp);
        $user->alamat = $request->alamat;
        $user->id_role = 4;
        $user->no_hp = $request->no_hp;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_hp = $request->no_hp;
        $user->save();

        $walisantri = new WaliSantri;

        $walisantri->id = $user->id;
        $walisantri->no_ktp = $request->no_ktp;
        $walisantri->no_kk = $request->no_kk;
        $walisantri->kode_halaqah = $request->kode_halaqah;

        $walisantri->save();

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Tambahkan!", "success");</script>');
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => WaliSantri::where("id", $request->id)->first(),
            "data_halaqah" => Halaqah::get()
        ];

        return view("app.administrator.wali_santri.v_edit", $data);
    }

    public function update(Request $request)
    {
        WaliSantri::where("id", $request->id)->update([
            "no_ktp" => $request->no_ktp,
            "no_kk" => $request->no_kk,
            "kode_halaqah" => $request->kode_halaqah
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

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Simpan!", "success");</script>');
    }

    public function destroy($id)
    {
        User::where("id", $id)->delete();

        WaliSantri::where("id", $id)->delete();

        return redirect()->back()->with('message', '<script>Swal.fire("Berhasil", "Data Berhasil di Hapus", "success");</script>');
    }

    public function datatables()
    {
        $user = AdminLokasiRt::where("kode_rt", Auth::user()->getAdminLokasiRt->kode_rt)->first();
        $lokasi = LokasiRt::where("kode_rt", $user->kode_rt)->first();
        $halaqah = Halaqah::where("kode_rt", $lokasi->kode_rt)->first();
        $santri = Santri::where("kode_halaqah", $halaqah->kode_halaqah)->get();
        $walisantri = WaliSantri::where("kode_halaqah", $halaqah->kode_halaqah)->get();

        $data = array();
        foreach ($walisantri as $user) {
            if ($user->getUser->jenis_kelamin == "L") {
                $jk = 'Laki-laki';
            } else {
                $jk = 'Perempuan';
            }

            $data[] = [
                'id' => $user->id,
                'no_kk' => $user->no_kk,
                'nama_lengkap' => $user->getUser->nama,
                'jenis_kelamin' => $jk,
                'no_hp' => $user->getUser->no_hp,
                'jumlah_anak' => $santri->where('id_wali', $user->id)->count(),
            ];
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $aksiBtn = '<button onclick="tambahDataSantri(' . $row["id"] . ')" type="button"
                                class="btn btn-success btn-sm" id="btnTambahSantri"
                                data-target="#modalTambahSantri" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                            </button>';
                $aksiBtn .= '<button onclick="editDataWali(' . $row["id"] . ')" type="button"
                                class="btn btn-warning btn-sm text-white" id="btnEdit"
                                data-target="#modalEdit" data-toggle="modal">
                                <i class="fa fa-edit"></i>
                            </button>';
                $aksiBtn .= '<form action="' . url("/app/sistem/wali_santri/" . $row["id"]) . '"
                            method="POST" style="display: inline;">
                            ' . method_field('delete') . '
                            ' . csrf_field() . '
                            <input type="hidden" name="id" value="' . $row["id"] . '">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>';
                return $aksiBtn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
