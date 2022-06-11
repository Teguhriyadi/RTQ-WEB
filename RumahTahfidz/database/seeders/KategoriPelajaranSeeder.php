<?php

namespace Database\Seeders;

use App\Models\KategoriPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPelajaran::create([
            "id_jenjang" => 1,
            "id_pelajaran" => 1,
            "id_kategori_penilaian" => 1
        ]);

        KategoriPelajaran::create([
            "id_jenjang" => 2,
            "id_pelajaran" => 2,
            "id_kategori_penilaian" => 1
        ]);

        KategoriPelajaran::create([
            "id_jenjang" => 1,
            "id_pelajaran" => 2,
            "id_kategori_penilaian" => 1
        ]);
    }
}
