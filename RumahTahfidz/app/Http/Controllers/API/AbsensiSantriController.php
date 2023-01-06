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
use Carbon\Carbon;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiSantriController extends Controller
{
    protected $absensi, $santri;

    public function __construct(Absensi $absensi, Santri $santri)
    {
        $this->absensi = $absensi;
        $this->santri = $santri;
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

    public function store(SantriIndexRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $date = Carbon::now();
            $data = '';

            $santri = $this->santri
                ->where("id_jenjang", $request->id_jenjang)
                ->where("kode_halaqah", $request->kode_halaqah)
                ->get();

            foreach ($santri as $s) {
                $absensi = $this->absensi
                    ->where("id_santri", $s->id)
                    ->whereDate("created_at", $date)
                    ->first();

                if ($absensi == null) {
                    $absensi = new Absensi;
                    $absensi->id_santri = $s->id;
                    $absensi->id_status_absen = 1;
                    $absensi->keterangan = "-";
                    $absensi->id_jenjang = $request->id_jenjang;
                    $absensi->id_asatidz = Auth::user()->id;
                    $data = $absensi->save();
                }
            }

            return $data;
        });
    }

    public function update($id, SantriRequest $request)
    {
        return DB::transaction(function () use ($request) {
            return $this->absensi->where("id", $id)->update([
                "id_status_absen" => $request->id_status_absen,
                "keterangan" => $request->keterangan,
            ]);
        });
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
