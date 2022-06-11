<?php

namespace App\Exports;

use App\Models\Santri;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class SantriExport implements FromView
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $santri = Santri::all();
        // dd($santri);

        return view('app.export.v_santri', compact('santri'));
    }
}
