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
            "id" => 10,
            "no_ktp" => "29092002",
            "no_kk" => "12345678910111213",
            "kode_halaqah" => "HLQSRJ001",
            "pekerjaan" => "Polisi"
        ]);
    }
}
