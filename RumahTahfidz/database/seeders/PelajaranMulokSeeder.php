<?php

namespace Database\Seeders;

use App\Models\PelajaranMulok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranMulokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PelajaranMulok::create([
            "pelajaran" => "Doa Makan dan Sesudah Makan"
        ]);

        PelajaranMulok::create([
            "pelajaran" => "Doa Tidur dan Bangun Tidur"
        ]);

        PelajaranMulok::create([
            "pelajaran" => "Niat Wudhu dan Rukun Wudhu"
        ]);

        PelajaranMulok::create([
            "pelajaran" => "Tujuan & Jenis - Jenis Sholat"
        ]);

        PelajaranMulok::create([
            "pelajaran" => "Doa Masuk dan Keluar Masjid"
        ]);
    }
}
