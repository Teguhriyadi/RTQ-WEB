<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $data = [];
        foreach ($user as $u) {
            $data[] = [
                'nama' => $u->nama,
                'email' => $u->email,
                'id_role' => $u->getRole->keterangan
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
        $validasi = Validator::make($request->all(), [
            "nama" => "required",
            "email" => "required",
            "password" => "required",
            "id_role" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = User::create([
            "id" => time(),
            "nama" => $request->nama,
            "email" => $request->email,
            "password" => $request->password,
            "id_role" => $request->id_role
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
        $data = User::findOrfail($id);

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
            'keterangan' => 'required',
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = User::where('id', $id)->update([
            'keterangan' => $request->keterangan
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
        $role = User::findOrfail($id);

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
}
