<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\KategoriPelajaran\Jenjang;
use App\Http\Filters\KategoriPelajaran\Penilaian;
use App\Http\Resources\Pelajaran\PelajaranCollection;
use App\Models\KategoriPelajaran;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class KategoriPelajaranController extends Controller
{
    protected $kategoriPelajaran;

    public function __construct(KategoriPelajaran $kategoriPelajaran)
    {
        $this->kategoriPelajaran = $kategoriPelajaran;
    }

    public function index()
    {
        $kategoriPelajaran = app(Pipeline::class)
            ->send(KategoriPelajaran::query())
            ->through([
                Jenjang::class,
                Penilaian::class
            ])
            ->thenReturn()
            ->get();

        return new PelajaranCollection($kategoriPelajaran);
    }

    public function show($id_jenjang, $id_kategori_penilaian)
    {
        $santri = KategoriPelajaran::where("id_kategori_penilaian", $id_kategori_penilaian)->where('id_jenjang', $id_jenjang)->get();

        if ($santri->count() < 1) {
            return null;
        } else {
            if ($santri) {
                foreach ($santri as $s) {
                    $data[] = [
                        'id' => $s->id,
                        'id_jenjang' => $s->id_jenjang,
                        'id_kategori' => $s->getKategoriPenilaian->id,
                        'nama_pelajaran' => $s->getPelajaran->nama_pelajaran
                    ];
                }
            } else {
                return null;
            }
        }

        return response()->json($data);
    }
}
