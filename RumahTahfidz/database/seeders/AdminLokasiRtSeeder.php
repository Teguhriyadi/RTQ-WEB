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
            "id" => "2",
            "pendidikan_terakhir" => "SMK",
            "kode_rt" => "RTQ-001"
        ]);
    }
}
