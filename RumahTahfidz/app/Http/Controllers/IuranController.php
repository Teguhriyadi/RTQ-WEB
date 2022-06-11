<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    public function validasi_admin_cabang()
    {
        if (Auth::user()->getAkses->id_role == 1) {
            $id_status_validasi = 3;
        } else if (Auth::user()->getAkses->id_role == 2) {
            $id_status_validasi = 2;
        }

        $data = [
            "data_santri" => Santri::get(),
            "data_iuran" => Iuran::where("id_status_validasi", $id_status_validasi)->paginate(10)
        ];

        return view("app.administrator.iuran.v_index", $data);
    }

    public function simpan_validasi(Request $request)
    {
        if (Auth::user()->getAkses->id_role == 1) {
            $id_status_validasi = 4;
        } else if (Auth::user()->getAkses->id_role == 2) {
            $id_status_validasi = 3;
        }

        foreach ($request->id as $data => $value) {
            Iuran::where("id", $request->id[$data])->update([
                "id_status_validasi" => $id_status_validasi,
                "id_users" => Auth::user()->id
            ]);
        }

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Validasi Berhasil', 'success');</script>"]);
    }
}
