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
            "kategori_penilaian" => "Tadribat"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Hafalan"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Imla"
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Iman & Adab"
        ]);
    }
}
