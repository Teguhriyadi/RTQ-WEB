<?php

namespace App\Http\Controllers\Public\Master;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $data["pelajaran"] = Pelajaran::get();

        return view("app.public.master.pelajaran.v_index", $data);
    }

    public function store(Request $request)
    {
        $count = Pelajaran::where("nama_pelajaran", $request->nama_pelajaran)->count();

        if ($count > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            Pelajaran::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data["edit"] = Pelajaran::where("id", $request->id)->first();

        return view("app.public.master.pelajaran.v_edit", $data);
    }

    public function update(Request $request)
    {
        $count = Pelajaran::where("nama_pelajaran", $request->nama_pelajaran)->count();

        if ($count > 0) {
            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Duplikasi Data', 'error');</script>"]);
        } else {
            Pelajaran::where("id", decrypt($request->id))->update([
                "nama_pelajaran" => $request->nama_pelajaran
            ]);

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success');</script>"]);
        }
    }

    public function destroy($id)
    {
        Pelajaran::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
