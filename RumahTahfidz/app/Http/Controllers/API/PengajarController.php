<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengajar;
use App\Models\User;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengajar::all();

        return response()->json(['message' => 'Request Success!', 'data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "telepon" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek1 = Pengajar::create([
            'id' => time(),
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon
        ]);

        $cek = User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => "data@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => $request->alamat,
            "id_role" => 2,
            "no_hp" => $request->telepon,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir
        ]);

        if ($cek) {
            $data = [
                'message' => 'Create Success!',
                'status' => true
            ];
        } else {
            $data = [
                'message' => 'Create Failed!',
                'status' => false
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengajar::findOrfail($id);

        return response()->json(['message' => 'Request Success!', 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(['message' => 'Not Found!'], 404);
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
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "telepon" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek_pengajar = Pengajar::where('id', $id)->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "telepon" => $request->telepon
        ]);

        $cek_user = User::where('no_hp', $request->oldNoHp)->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_hp" => $request->telepon
        ]);

        if ($cek_pengajar) {
            $data = [
                'message' => 'Update Success!',
                'status' => true
            ];
        } else {
            $data = [
                'message' => 'Update Failed!',
                'status' => false
            ];
        }

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengajar = Pengajar::findOrfail($id);

        User::where("no_hp", $data_pengajar->telepon)->delete();

        if ($data_pengajar) {
            $cek = $data_pengajar->delete();

            if ($cek) {
                $data = [
                    'message' => 'Delete Success!',
                    'status' => true
                ];
            } else {
                $data = [
                    'message' => 'Delete Failed!',
                    'status' => false
                ];
            }

            return response()->json($data, 200);
        }

        return response()->json(['message' => 'Not Found!'], 404);
    }
}
