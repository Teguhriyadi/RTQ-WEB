<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\NominalIuran;
use App\Models\Santri;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function belum_lunas()
    {
        $data = [
            "data_santri" => Administrasi::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Administrasi::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.biaya_administrasi.belum_lunas.v_belum_lunas", $data, compact('count'));
    }

    public function tambah_belum_lunas(Request $request)
    {
        Administrasi::create([
            "id_santri" => $request->id_santri,
            "nominal" => $request->nominal
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit_belum_lunas(Request $request)
    {
        $santri = Santri::where("id", $request->id)->first();

        $nominal = NominalIuran::where("id", $santri->id_nominal_iuran)->first();

        $data = [
            "iuran" => $nominal->nominal,
            "edit" => Santri::where("id", $request->id)->first(),
            "total_nominal" => Administrasi::where("id_santri", $request->id)->sum("nominal"),
            "detail_administrasi" => Administrasi::where("id_santri", $request->id)->first()
        ];

        return view("app.administrator.biaya_administrasi.belum_lunas.v_edit", $data);
    }

    public function lunas()
    {
        $data = [
            "data_santri" => Administrasi::selectRaw("id_santri")->distinct()->get()
        ];

        $count = 0;
        foreach ($data["data_santri"] as $d) {
            $count = Administrasi::where("id_santri", $d->id_santri)->sum("nominal");
        }

        return view("app.administrator.biaya_administrasi.lunas.v_lunas", $data, compact('count'));
    }
}
