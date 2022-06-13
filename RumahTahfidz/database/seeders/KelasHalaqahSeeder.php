<?php

namespace Database\Seeders;

use App\Models\KelasHalaqah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasHalaqahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KelasHalaqah::create([
            "id_asatidz" => 9,
            "kode_halaqah" => "HLQ-001",
            "kelas_halaqah" => "D3TI - 2C",
            "status" => "1",
        ]);

        KelasHalaqah::create([
            "id_asatidz" => 9,
            "kode_halaqah" => "HLQ-002",
            "kelas_halaqah" => "D3TI - 2C",
            "status" => "0"
        ]);
    }
}
