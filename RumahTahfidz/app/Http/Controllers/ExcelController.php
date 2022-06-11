<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SantriExport;
use App\Exports\WaliSantriExport;
use App\Imports\SantriImport;
use App\Imports\WaliSantriImport;
use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importSantri(Request $request)
    {
        Excel::import(new SantriImport, $request->file('importSantri'));

        return back();
    }

    public function exportSantri()
    {
        return Excel::download(new SantriExport, date("Y_m_d") . '_' . time() . '_REKAP_SANTRI.xlsx');
    }

    public function importWaliSantri(Request $request)
    {
        Excel::import(new WaliSantriImport, $request->file('importWaliSantri'));

        return response()->json(1, 201);
    }

    public function exportWaliSantri()
    {
        return Excel::download(new WaliSantriExport, date("Y_m_d") . '_' . time() . '_REKAP_WALI_SANTRI.xlsx');
    }
}
