<?php

namespace Database\Seeders;

use App\Models\AdminCabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminCabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminCabang::create([
            "id" => 6,
            "pendidikan_terakhir" => "SMK",
            "id_cabang" => 1
        ]);

        AdminCabang::create([
            "id" => 7,
            "pendidikan_terakhir" => "SMA",
            "id_cabang" => 2
        ]);
    }
}
