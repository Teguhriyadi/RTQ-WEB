<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenjang::all();

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
            "jenjang" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Jenjang::create([
            "id_jenjang" => time(),
            "jenjang" => $request->jenjang
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
        $data = Jenjang::findOrfail($id);

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
            "jenjang" => "required"
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Jenjang::where("id_jenjang", $id)->update([
            "jenjang" => $request->jenjang
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
    public function destroy($id_jenjang)
    {
        $jenjang = Jenjang::where("id_jenjang", $id_jenjang);

        if ($jenjang) {
            $cek = $jenjang->where("id_jenjang", $id_jenjang)->delete();

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
