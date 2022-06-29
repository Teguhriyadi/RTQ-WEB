<?php

namespace Database\Seeders;

use App\Models\Asatidz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsatidzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asatidz::create([
            "id" => 3,
            "nomor_induk" => "12345678",
            "no_ktp" => 123456,
            "pendidikan_terakhir" => "SMA",
            "aktivitas_utama" => "Mengajar",
            "motivasi_mengajar" => "Mau Mengajar"
        ]);
    }
}
