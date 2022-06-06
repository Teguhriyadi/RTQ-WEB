<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        User::create([
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "gambar" => $data,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "status" => 1
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
            "edit" => User::where("id", $id)->first()
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
        //
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
