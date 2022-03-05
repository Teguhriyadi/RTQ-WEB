<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\Profil;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Profil::all();

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
            "singkatan" => "required",
            "no_hp" => "required",
            "email" => "required",
            "alamat" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Profil::create([
            "nama" => $request->nama,
            "singkatan" => $request->singkatan,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat
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
        $data = Profil::findOrfail($id);

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
            "singkatan" => "required",
            "no_hp" => "required",
            "email" => "required",
            "alamat" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Profil::where('id', $id)->update([
            "nama" => $request->nama,
            "singkatan" => $request->singkatan,
            "no_hp" => $request->no_hp,
            "email" => $request->email,
            "alamat" => $request->alamat
        ]);

        if ($cek) {
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
        $role = Profil::findOrfail($id);

        if ($role) {
            $cek = $role->delete();

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

    public function info_profil($no_hp)
    {
        $data = User::where("no_hp", $no_hp)->first();

        $detail = '';

        if ($data->id_role == 2) {
            $detail = Pengajar::where("telepon", $data->no_hp)->first();
        } else if ($data->id_role == 3) {
            $detail = Siswa::where("no_hp", $data->no_hp)->first();
        }

        if ($detail) {
            $profil = [
                'nama' => $detail->nama,
                'email' => $data->email,
                "no_hp" => $data->no_hp,
                "alamat" => $data->alamat,
                "jenis_kelamin" => $detail->jenis_kelamin,
                "keterangan" => $data->getRole->keterangan,
            ];
        } else {
            $profil = [
                'nama' => $data->nama,
                'email' => $data->email,
                "no_hp" => $data->no_hp,
                "alamat" => $data->alamat,
                "keterangan" => $data->getRole->keterangan,
                "tempat_lahir" => $data->tempat_lahir,
                "tanggal_lahir" => $data->tanggal_lahir,
                "gambar" => $data->gambar
            ];
        }



        return response()->json(['message' => 'Request Success!', 'data' => $profil], 200);
    }
}
