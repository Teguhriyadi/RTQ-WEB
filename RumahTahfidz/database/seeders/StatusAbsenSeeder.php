<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusAbsen;

class StatusAbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusAbsen::create([
            "keterangan_absen" => "Hadir"
        ]);

        StatusAbsen::create([
            "keterangan_absen" => "Izin"
        ]);

        StatusAbsen::create([
            "keterangan_absen" => "Sakit"
        ]);

        StatusAbsen::create([
            "keterangan_absen" => "Alfa"
        ]);
    }
}
