<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilSantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
            'wali_santri' => User::where('id', Auth::user()->id)->first()
        ];
        return view('app.wali_santri.profil.v_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'santri' => Santri::where('id', $id)->first(),
            'data_kelas' => Kelas::all()
        ];

        return view('app.wali_santri.profil.v_detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'santri' => Santri::where('id', $id)->first(),
        ];

        return view('app.wali_santri.profil.v_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            "nis" => 'required',
            "nama_lengkap" => 'required',
            "nama_panggilan" => 'required',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required',
            "alamat" => 'required',
            "sekolah" => 'required',
            "id_kelas" => 'required',
        ]);

        Santri::where("id", $id)->update($validasi);

        return redirect('app/sistem/profil_santri/' . $id)->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan!', 'success')</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
