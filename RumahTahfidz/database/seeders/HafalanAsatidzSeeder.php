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
            "id_asatidz" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
            "quran_awal" => "An - Nas",
            "quran_akhir" => "Al - Ikhlas",
            "keterangan" => "Berhasil"
        ]);
    }
}
