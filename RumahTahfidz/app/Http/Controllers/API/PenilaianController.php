<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Nilai\Santri;
use App\Http\Requests\API\Nilai\CreateRequest;
use App\Http\Resources\Nilai\NilaiCollection;
use App\Http\Resources\Nilai\NilaiDetail;
use App\Models\KategoriPelajaran;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    protected $nilai;

    public function __construct(Nilai $nilai)
    {
        $this->nilai = $nilai;
    }

    public function index()
    {
        $nilai = app(Pipeline::class)
            ->send(Nilai::query())
            ->through([
                Santri::class
            ])
            ->thenReturn()
            ->get();

        return new NilaiCollection($nilai);
    }

    public function show($id_pelajaran, $id_santri)
    {
        $nilai = $this->nilai->where('id_kategori_pelajaran', $id_pelajaran)->where('id_santri', $id_santri)->first();

        return new NilaiDetail($nilai);
    }

    public function store(CreateRequest $request)
    {
        return DB::transaction(function() use ($request) {
            return $this->nilai->create([
                'id_asatidz' => Auth::user()->id,
                'id_santri' => $request->id_santri,
                'id_jenjang' => $request->id_jenjang,
                'id_kategori_pelajaran' => $request->id_kategori_pelajaran,
                'nilai' => $request->nilai,
            ]);
        });
    }

    public function update($id, Request $request)
    {
        return DB::transaction(function() use ($request) {
            return $this->nilai->where('id', $id)->update([
                'id_asatidz' => Auth::user()->id,
                'nilai' => $request->nilai,
            ]);
        })
    }
}
