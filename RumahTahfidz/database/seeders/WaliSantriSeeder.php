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
            "id" => 4,
            "no_ktp" => "29092002",
            "no_kk" => "12345678910111213",
            "kode_halaqah" => "HLQ-001",
            "pekerjaan" => "Polisi"
        ]);

        WaliSantri::create([
            "id" => 5,
            "no_ktp" => "8294829482",
            "no_kk" => "123456789101123123",
            "kode_halaqah" => "HLQ-002",
            "pekerjaan" => "Polisi"
        ]);

        WaliSantri::create([
            "id" => 6,
            "no_ktp" => "23647199202",
            "no_kk" => "374387483478347834",
            "kode_halaqah" => "HLQ-003",
            "pekerjaan" => "Polisi"
        ]);
    }
}
