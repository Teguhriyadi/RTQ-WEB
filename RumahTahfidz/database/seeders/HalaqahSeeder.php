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
            "kode_halaqah" => "HLQ-001",
            "nama_halaqah" => "Singaraja 1",
            "kode_rt" => "RTQ-001"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQ-002",
            "nama_halaqah" => "Singaraja 2",
            "kode_rt" => "RTQ-002"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQ-003",
            "nama_halaqah" => "Singaraja 3",
            "kode_rt" => "RTQ-003"
        ]);

        Halaqah::create([
            "kode_halaqah" => "HLQ-004",
            "nama_halaqah" => "Singaraja ",
            "kode_rt" => "RTQ-004"
        ]);
    }
}
