<?php

namespace Database\Seeders;

use App\Models\KategoriPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPenilaian::create([
            "kategori_penilaian" => "Tilawah"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Qiraah 1"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Qiraah 2"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Qiraah 3"
        ]);
    }
}
