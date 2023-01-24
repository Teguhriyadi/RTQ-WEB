<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Cabang\Search;
use App\Http\Resources\Cabang\CabangCollection;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\LokasiRt;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Hash;

class CabangController extends Controller
{
    protected $halaqah;

    public function __construct(Halaqah $halaqah)
    {
        $this->halaqah = $halaqah;
    }

    public function index()
    {
        $halaqah = app(Pipeline::class)
            ->send(Halaqah::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->get();


        return new CabangCollection($halaqah);
    }

    public function filter_cabang($kode_rt)
    {
        $halaqah = Halaqah::where("kode_rt", $kode_rt)->first();

        $lokasi = LokasiRt::where("kode_rt", $halaqah->kode_rt)->get();

        if ($lokasi->count() < 0) {
            $data = "Data Tidak Ada";
        } else {
            $data = [];

            foreach ($lokasi as $l) {
                $data[] = [
                    "kode_rt" => $l->kode_rt,
                    "lokasi_rt" => $l->lokasi_rt
                ];
            }
        }

        return response()->json($data, 200);
    }
}
