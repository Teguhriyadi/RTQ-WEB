<?php

namespace App\Http\Controllers;

use App\Models\LokasiRt;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\HakAkses;

class UsersController extends Controller
{

    public function index()
    {
        $data = [
            "data_users" => User::get()
        ];

        return view("app.super_admin.users.v_index", $data);
    }

    public function store(Request $request)
    {
        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("users");
        }

        $user = new User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt("super".$request->no_hp);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->gambar = $data;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->status = 1;

        $user->save();

        $hak_akses = new HakAkses;

        $hak_akses->id_user = $user->id;
        $hak_akses->id_role = 1;

        $hak_akses->save();

        User::where("id", $user->id)->update([
            "id_hak_akses" => $hak_akses->id
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('app.super_admin.users.v_detail', compact('user'));
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
            "user" => User::where("id", $id)->first(),
            "lokasi_rt" => LokasiRt::all()
        ];

        return view("app.super_admin.users.v_edit", $data);
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
        dd($request->all());
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

    public function non_aktifkan(Request $request)
    {
        User::where("id", $request->id)->update([
            "status" => "0"
        ]);

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Ubah', 'success')</script>");
    }
}
