<?php

namespace Database\Seeders;

use App\Models\KategoriPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            "kategori_penilaian" => "Tadribat",
            'slug' => Str::slug("Tadribat")
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Hafalan",
            'slug' => Str::slug("Hafalan")
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Imla",
            'slug' => Str::slug("Imla")
        ]);

        KategoriPenilaian::create([
            "kategori_penilaian" => "Iman & Adab",
            'slug' => Str::slug("Iman & Adab")
        ]);
    }
}
