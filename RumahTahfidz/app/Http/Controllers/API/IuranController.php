<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Iuran\Santri as IuranSantri;
use App\Http\Requests\API\Iuran\CreateRequest;
use App\Http\Resources\Iuran\IuranCollection;
use App\Http\Resources\Iuran\IuranDetail;
use App\Models\Iuran;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    protected $iuran;

    public function __construct(Iuran $iuran)
    {
        $this->iuran = $iuran;
    }

    public function index()
    {
        $iuran = app(Pipeline::class)
            ->send(Iuran::query())
            ->through([
                IuranSantri::class,
            ])
            ->thenReturn()
            ->get();

        return new IuranCollection($iuran);
    }

    public function show($id_santri)
    {
        $date = Carbon::now();
        $santri = $this->iuran
            ->where('id_santri', $id_santri)
            ->whereDate('created_at', $date)
            ->first();

        return new IuranDetail($santri);
    }

    public function store(CreateRequest $request)
    {
        return $this->iuran->create([
            'nominal' => $request->nominal,
            'id_santri' => $request->id_santri,
            'id_users' => Auth::user()->id,
            'bukti' => '-',
            'id_status_validasi' => 2,
            'tanggal' => Carbon::now(),
        ]);
    }
}
