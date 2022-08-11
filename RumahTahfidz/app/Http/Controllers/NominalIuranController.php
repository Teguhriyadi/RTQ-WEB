<?php

namespace App\Http\Controllers;

use App\Models\NominalIuran;
use Illuminate\Http\Request;

class NominalIuranController extends Controller
{
    public function index()
    {
        $data = [
            "data_nominal_iuran" => NominalIuran::get()
        ];

        return view("app.super_admin.settings.nominal_iuran.v_index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "nominal" => "required"
        ]);

        $pecah = substr($request->nominal, 4, 100);
        $nominal = str_replace('.', '', $pecah);

        NominalIuran::create([
            'nominal' => $nominal
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => NominalIuran::where("id", $request->id)->first()
        ];

        return view("app.super_admin.settings.nominal_iuran.v_edit", $data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "nominal" => "required"
        ]);

        $pecah = substr($request->nominal, 4, 100);
        $nominal = str_replace('.', '', $pecah);

        NominalIuran::where("id", decrypt($request->id))->update([
            "nominal" => $nominal
        ]);

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
    }

    public function destroy($id)
    {
        NominalIuran::where("id", $id)->delete();

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }

    public function aktifkan(Request $request)
    {
        $jumlah = NominalIuran::where("status", 1)->count();

        if ($jumlah > 0) {
            return back()->with(["message" => "<script>Swal.fire('Maaf', 'Data Sudah Ada Yang AKtif', 'error');</script>"]);
        } else {
            NominalIuran::where("id", $request->id)->update([
                "status" => 1
            ]);
        }

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di di Simpan!', 'success');</script>"]);
    }

    public function non_aktifkan(Request $request)
    {
        $nominal_iuran = NominalIuran::where("status", 1)->first();

        if ($nominal_iuran) {

            NominalIuran::where("id", $request->id)->update([
                "status" => 1
            ]);

            NominalIuran::where("status", 1)->update([
                "status" => 0
            ]);
        } else {
            echo "tidak ada";
        }

        return back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }
}
