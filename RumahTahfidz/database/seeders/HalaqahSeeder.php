<?php

namespace Database\Seeders;

use App\Models\Halaqah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HalaqahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Halaqah::create([
            "kode_halaqah" => "HLQSRJ001",
            "nama_halaqah" => "Singaraja 1",
            "kode_rt" => "RTQ001"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQSRJ002",
            "nama_halaqah" => "Singaraja 2",
            "kode_rt" => "RTQ002"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQSRJ003",
            "nama_halaqah" => "Singaraja 3",
            "kode_rt" => "RTQ003"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQSRJ004",
            "nama_halaqah" => "Singaraja ",
            "kode_rt" => "RTQ004"
        ]);
    }
}
