<?php

namespace App\Http\Controllers\Public\Master;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data["jabatan"] = Jabatan::get();

        return view("app.public.master.jabatan.v_index", $data);
    }

    public function store(Request $request)
    {
        $cek = Jabatan::where("nama_jabatan", $request->nama_jabatan)->count();

        if ($cek > 0) {

            return redirect()->back()->with(["message" => "<script>Swal.fire('Error', 'Tidak Boleh Ada Duplikasi Data', 'error');</script>"]);
        } else {
            Jabatan::create($request->all());

            return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Tambahkan', 'success');</script>"]);
        }
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Jabatan::where("id", $request->id)->first()
        ];

        return view("app.public.master.jabatan.v_edit", $data);
    }

    public function update(Request $request)
    {
        Jabatan::where("id", $request->id)->update([
            "nama_jabatan" => $request->nama_jabatan
        ]);

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function destroy($id)
    {
        Jabatan::where("id", $id)->delete();

        return redirect()->back()->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success');</script>"]);
    }
}
