<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Santri;
use App\Models\StatusValidasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RekapIuranController extends Controller
{
    public function index()
    {
        $data = [
            'santri' => Santri::where('id_wali', Auth::user()->id)->get(),
        ];

        return view('app.wali_santri.rekap_iuran.v_index', $data);
    }

    public function detail($id)
    {
        $data = [
            'santri' => Iuran::where('id_santri', $id)->get()
        ];

        return view('app.wali_santri.rekap_iuran.v_detail', $data);
    }

    public function datatable($id)
    {
        $iuran = Iuran::where('id_santri', $id)->get();

        $data = [];

        foreach ($iuran as $i) {
            $data[] = [
                'nis' => $i->getSantri->nis,
                'nama' => $i->getSantri->nama_lengkap,
                'nominal' => 'Rp. ' . number_format($i->nominal, 0, '', '.'),
                'tgl_bayar' => Carbon::createFromFormat('Y-m-d', $i->tanggal)->isoFormat('dddd, D MMMM Y'),
                'validasi' => $i->id_status_validasi
            ];
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $status = StatusValidasi::where('id', $row['validasi'])->first();
                if ($status->id == 4) {
                    $aksiBtn = "<div class='text-center'><div class='btn btn-sm bg-success text-white'>$status->status</div></div>";
                } else {
                    $aksiBtn = "<div class='text-center'><div class='btn btn-sm bg-warning text-white'>$status->status</div></div>";
                }

                return $aksiBtn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
