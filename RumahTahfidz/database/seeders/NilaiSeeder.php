<?php

namespace Database\Seeders;

use App\Models\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nilai::create([
            "id_asatidz" => 9,
            "id_santri" => 1,
            "id_kategori_pelajaran" => 1,
            "nilai" => 90
        ]);
    }
}
