<?php

namespace Database\Seeders;

use App\Models\KategoriPelajaranTadribat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPelajaranTadribatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPelajaranTadribat::create([
            "id_jenjang" => 1,
            "id_pelajaran" => 1
        ]);

        KategoriPelajaranTadribat::create([
            "id_jenjang" => 1,
            "id_pelajaran" => 2
        ]);

        KategoriPelajaranTadribat::create([
            "id_jenjang" => 2,
            "id_pelajaran" => 3
        ]);
    }

}
