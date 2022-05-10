<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SantriExport;
use App\Imports\SantriImport;
use App\Imports\WaliSantriImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importSantri(Request $request)
    {
        Excel::import(new SantriImport, $request->file('importSantri'));

        return back();
    }

    public function importWaliSantri(Request $request)
    {
        // dd($request);
        Excel::import(new WaliSantriImport, $request->file('importWaliSantri'));

        return response()->json(1, 201);
    }
}
