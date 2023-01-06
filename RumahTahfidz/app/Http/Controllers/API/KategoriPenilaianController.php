<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\KategoriPenilaian\Jenjang;
use App\Http\Resources\Penilaian\PenilaianCollection;
use App\Models\KategoriPelajaran;
use App\Models\KategoriPenilaian;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class KategoriPenilaianController extends Controller
{
    public function index()
    {
        $kategoriPenilaian = app(Pipeline::class)
            ->send(KategoriPenilaian::query())
            ->through([])
            ->thenReturn()
            ->get();

        return new PenilaianCollection($kategoriPenilaian);
    }
}
