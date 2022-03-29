<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\SantriExport;
use App\Imports\SantriImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importSantri(Request $request)
    {
        Excel::import(new SantriImport, $request->file('importSantri'));

        return back();
    }
}
