<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabang::create([
            "nama_cabang" => "Cabang Indramayu"
        ]);

        Cabang::create([
            "nama_cabang" => "Cabang Subang"
        ]);

        Cabang::create([
            "nama_cabang" => "Cabang Cirebon"
        ]);
    }
}
