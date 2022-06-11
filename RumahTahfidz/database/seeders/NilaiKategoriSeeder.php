<?php

namespace Database\Seeders;

use App\Models\NilaiKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NilaiKategori::create([
            "nilai_awal" => 100,
            "nilai_akhir" => 90,
            "nilai_kategori" => "Jayyid"
        ]);

        NilaiKategori::create([
            "nilai_awal" => 90,
            "nilai_akhir" => 80,
            "nilai_kategori" => "A"
        ]);
    }
}
