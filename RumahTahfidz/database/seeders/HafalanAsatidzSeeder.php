<?php

namespace Database\Seeders;

use App\Models\Quran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HafalanAsatidzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quran::create([
            "id_asatidz" => 9,
            "quran_awal" => "An - Nas",
            "quran_akhir" => "Al - Ikhlas",
            "keterangan" => "Berhasil"
        ]);
    }
}
