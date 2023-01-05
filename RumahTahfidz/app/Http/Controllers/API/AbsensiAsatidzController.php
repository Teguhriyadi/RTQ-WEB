<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Absensi\AsatidzRequest;
use App\Http\Resources\Absensi\Asatidz\AbsensiCollection;
use App\Http\Resources\Absensi\Asatidz\AbsensiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Absensi;
use App\Models\AbsensiAsatidz;
use Illuminate\Support\Facades\Auth;

class AbsensiAsatidzController extends Controller
{
    protected $absensiAsatidz;

    public function __construct(AbsensiAsatidz $absensiAsatidz)
    {
        $this->absensiAsatidz = $absensiAsatidz;
    }

    public function index()
    {
        $tanggal = date("Y-m-d");

        $absensiAsatidz = $this->absensiAsatidz->where("id_asatidz", Auth::user()->id)->whereDate("created_at", $tanggal)->first();

        return new AbsensiDetail($absensiAsatidz);
    }

    public function create(AsatidzRequest $request)
    {
        $asatidz = Str::random(32);

        $request->file('gambar')->move('assets/absensi/asatidz/' . date('Y_m_d'), $asatidz);
        $absensiAsatidz = $this->absensiAsatidz->create([
            'gambar' => url('') . '/assets/absensi/asatidz/' . date('Y_m_d') . '/' . $asatidz,
            'alamat' => $request->alamat,
            'id_asatidz' => Auth::user()->id,
        ]);

        return $absensiAsatidz;
    }

    public function recap()
    {
        $absensiAsatidz = $this->absensiAsatidz->where("id_asatidz", Auth::user()->id)->get();

        return new AbsensiCollection($absensiAsatidz);
    }
}
