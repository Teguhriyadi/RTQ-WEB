<?php

namespace Database\Seeders;

use App\Models\WaliSantri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaliSantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaliSantri::create([
            "nik" => "12345",
            "no_kk" => "7755",
            "id_cabang" => 1
        ]);

        WaliSantri::create([
            "nik" => "12346",
            "no_kk" => "7756",
            "id_cabang" => 2
        ]);
    }
}
