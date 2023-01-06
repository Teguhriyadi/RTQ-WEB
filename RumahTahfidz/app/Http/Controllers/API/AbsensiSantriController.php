<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Absensi\Santri\Halaqoh;
use App\Http\Filters\Absensi\Santri\InDay;
use App\Http\Filters\Absensi\Santri\Jenjang;
use App\Http\Requests\API\Absensi\SantriIndexRequest;
use App\Http\Requests\API\Absensi\SantriRequest;
use App\Http\Resources\Absensi\Santri\SantriCollection;
use App\Http\Resources\Absensi\Santri\SantriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Santri;
use App\Models\Absensi;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

class AbsensiSantriController extends Controller
{
    protected $absensi;

    public function __construct(Absensi $absensi)
    {
        $this->absensi = $absensi;
    }

    public function index(SantriIndexRequest $request)
    {
        $santri = app(Pipeline::class)
            ->send(Absensi::with(['getStatusAbsen']))
            ->through([
                InDay::class
            ])
            ->thenReturn()
            ->get();

        return new SantriCollection($santri);
    }

    public function create(Request $request, $id_jenjang, $kode_halaqah)
    {
        $date = date('Y-m-d');
        $santri = Santri::where("id_jenjang", $id_jenjang)->where("kode_halaqah", $kode_halaqah)->get();

        foreach ($santri as $s) {
            $absensi = Absensi::where("id_santri", $s->id)->whereDate("created_at", $date)->first();

            if ($absensi == null) {
                $absensi = new Absensi;
                $absensi->id_santri = $s->id;
                $absensi->id_status_absen = 1;
                $absensi->keterangan = "-";
                $absensi->id_asatidz = Auth::user()->id;
                $absensi->save();

                return response()->json('Data berhasil disimpan', 200);
            }
        }

        return null;
    }

    public function update($id, SantriRequest $request)
    {
        return $this->absensi->where("id", $id)->update([
            "id_status_absen" => $request->id_status_absen,
            "keterangan" => $request->keterangan,
        ]);
    }

    public function show($id)
    {
        $date = date("Y-m-d");

        $absen = $this->absensi->with(['getStatusAbsen'])
            ->where("id_santri", $id)
            ->whereDate("created_at", $date)
            ->first();

        return new SantriDetail($absen);
    }
}
