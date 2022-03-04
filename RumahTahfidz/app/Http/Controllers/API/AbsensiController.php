<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::all();

        $dataAll = array();

        foreach ($absensi as $a) {
            $dataAll[] = [
                'siswa' => $a->getSiswa->nama,
                'keterangan' => $a->keterangan,
                'status_absen' => $a->getStatusAbsen->keterangan,
                'pengajar' => $a->getPengajar->nama,
                'tgl_absensi' => Carbon::createFromFormat('Y-m-d H:i:s', $a->created_at)->isoFormat('D MMMM Y h:mm:s')
            ];
        }

        $data = [
            'message' => 'Request Success!',
            'data' => $dataAll,
        ];

        return response()->json($data, 200);
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
            'id_siswa' => 'required',
            'keterangan' => 'required',
            'status_absen' => 'required',
            'id_pengajar' => 'required',
        ]);

        if ($validasi->fails()) {
            return response()->json($validasi->errors(), 400);
        }

        $cek = Absensi::create([
            'id' => time(),
            'id_siswa' => $request->id_siswa,
            'keterangan' => $request->keterangan,
            'status_absen' => $request->status_absen,
            'id_pengajar' => $request->id_pengajar,
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
