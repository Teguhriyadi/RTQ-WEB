<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            "keterangan" => "Hadir"
        ]);

        StatusAbsen::create([
            "keterangan" => "Sakit"
        ]);

        StatusAbsen::create([
            "keterangan" => "Izin"
        ]);

        StatusAbsen::create([
            "keterangan" => "Alfa"
        ]);
    }
}
