<?php

namespace App\Exports;

use App\Models\Santri;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class SantriExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $santri = Santri::all();
        foreach ($santri as $s) {
        }
    }
}
