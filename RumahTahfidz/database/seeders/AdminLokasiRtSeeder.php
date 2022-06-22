<?php

namespace Database\Seeders;

use App\Models\AdminLokasiRt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminLokasiRtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminLokasiRt::create([
            "id" => "8d303131-0fd4-4b62-a5ec-955ceb579996",
            "pendidikan_terakhir" => "SMK",
            "kode_rt" => "RTQ-001"
        ]);
    }
}
