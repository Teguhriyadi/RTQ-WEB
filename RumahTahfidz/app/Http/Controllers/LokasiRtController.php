<?php

namespace App\Http\Controllers;

use App\Models\LokasiRt;
use Illuminate\Http\Request;

class LokasiRtController extends Controller
{
    public function index()
    {
        $data = [
            "data_lokasi_rt" => LokasiRt::get()
        ];

        return view("app.super_admin.lokasi_rt.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = LokasiRt::where("kode_rt", $request->kode_rt)->count();

        if ($cek > 0) {
            return redirect()->back()->with('message', '<script>Swal.fire("Oops", "Tidak Boleh Ada Duplikasi Data", "error")</script>');
        } else {
            LokasiRt::create($request->all());

            return redirect()->back()->with('message', '<script>Swal.fire("Wooww", "Data anda berhasil ditambahkan!", "success")</script>');
        }

    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => LokasiRt::where("kode_rt", $request->kode_rt)->first()
        ];

        return view("app.super_admin.lokasi_rt.v_edit", $data);
    }

    public function update(Request $request)
    {
        LokasiRt::where("kode_rt", $request->kode_rt)->update([
            "lokasi_rt" => $request->lokasi_rt
        ]);

        return redirect()->back();
    }

    public function destroy($kode_rt)
    {
        LokasiRt::where("kode_rt", $kode_rt)->delete();

        return redirect()->back();
    }
}
