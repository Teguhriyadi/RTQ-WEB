<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Santri\Halaqah as SantriHalaqah;
use App\Http\Filters\Santri\Jenjang as SantriJenjang;
use App\Http\Filters\Santri\Search;
use App\Http\Filters\Santri\WaliSantri;
use App\Http\Resources\Santri\SantriCollection;
use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\LokasiRt;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class SantriController extends Controller
{
    protected $santri;

    public function __construct(Santri $santri)
    {
        $this->santri = $santri;
    }

    public function index()
    {
        $santri = app(Pipeline::class)
            ->send(Santri::with(['getHalaqah']))
            ->through([
                SantriHalaqah::class,
                SantriJenjang::class,
                WaliSantri::class,
                Search::class
            ])
            ->thenReturn()
            ->get();

        return new SantriCollection($santri);
    }
}
