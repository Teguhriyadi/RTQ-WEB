<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Siswa::all();
        $data = [];
        foreach ($user as $u) {
            $data[] = [
                "id" => $u->id,
                "nama" => $u->nama,
                "telepon" => $u->no_hp,
                "gambar" => $u->getUser->gambar
            ];
        }

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
        // dd($request->file('gambar'));
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "no_hp" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek1 = Siswa::create([
            'id' => time(),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'no_hp' => $request->no_hp
        ]);
        $gambar = '';
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('siswa');
        }

        $cek = User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => "siswa@gmail.com",
            "password" => bcrypt("password"),
            "alamat" => $request->alamat,
            "id_role" => 3,
            "no_hp" => $request->no_hp,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            // "gambar" => "http://rtq-freelance.my.id/storage/".$gambar
            "gambar" => url('storage').'/'.$gambar
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
        $data = Siswa::findOrfail($id);

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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_hp' => 'required'
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek_siswa = Siswa::where('id', $id)->update([
            "nama" => $request->nama,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "nama_ayah" => $request->nama_ayah,
            "nama_ibu" => $request->nama_ibu,
            "no_hp" => $request->no_hp,
        ]);

        $cek = User::where("no_hp", $request->oldNoHp)->update([
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "no_hp" => $request->oldNoHp
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
    public function destroy($no_hp)
    {
        $data_siswa = Siswa::findOrfail($no_hp);

        User::where("no_hp", $data_siswa->no_hp)->delete();

        if ($data_siswa) {
            $cek = $data_siswa->delete();

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
