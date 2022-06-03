<?php

namespace App\Exports;

use App\Models\WaliSantri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WaliSantriExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $wali_santri = WaliSantri::all();
        return view('app.export.v_wali_santri', compact('wali_santri'));
    }
}
