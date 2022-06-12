<?php

namespace Database\Seeders;

use App\Models\LokasiRt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LokasiRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LokasiRt::create([
            "kode_rt" => "RTQ-001",
            "lokasi_rt" => "RT Ulil Albab Karang Turi"
        ]);

        LokasiRt::create([
            "kode_rt" => "RTQ-002",
            "lokasi_rt" => "RT Ulil Albab Khodijah Karang Malang"
        ]);

        LokasiRt::create([
            "kode_rt" => "RTQ-003",
            "lokasi_rt" => "RT Ulil Albab Brondong"
        ]);

        LokasiRt::create([
            "kode_rt" => "RTQ-004",
            "lokasi_rt" => "RT Ulil Albab Asy Syifa Cidhayu"
        ]);
    }
}
