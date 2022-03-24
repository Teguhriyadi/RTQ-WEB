<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $data = [
            "data_users" => User::orderBy("id_role", "ASC")->get()
        ];

        return view("app.super_admin.users.v_index", $data);
    }

    public function store(Request $request)
    {
        User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "alamat" => $request->alamat,
            "no_hp" => $request->no_hp,
            "id_role" => 1,
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-01-01"
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
