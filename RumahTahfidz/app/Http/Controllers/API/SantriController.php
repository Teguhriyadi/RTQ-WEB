<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Santri\SantriCollection;
use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\LokasiRt;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    protected $santri;

    public function __construct(Santri $santri)
    {
        $this->santri = $santri;
    }

    public function index()
    {
        $santri = $this->santri->with(['getHalaqah'])->get();

        return new SantriCollection($santri);
    }

    public function showByWaliSantri(Request $request)
    {
        $santri = $this->santri->where('id_wali', $request->user()->id)->get();

        return new SantriCollection($santri);
    }

    public function showHalaqahJenjang($kode_halaqah = null, $id_jenjang = null)
    {
        if (!$kode_halaqah) {
            return response()->json(['message' => 'parameter kode halaqah null'], 400);
        }

        if (!$id_jenjang) {
            return response()->json(['message' => 'parameter id jenjang null'], 400);
        }

        $santri = $this->santri->where([
            ['kode_halaqah', $kode_halaqah],
            ['id_jenjang', $id_jenjang]
        ])->with(['getHalaqah'])->get();

        return new SantriCollection($santri);
    }
}
