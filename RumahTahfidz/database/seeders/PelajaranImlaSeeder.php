<?php

namespace Database\Seeders;

use App\Models\PelajaranImla;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranImlaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PelajaranImla::create([
            "pelajaran" => "Menulis Surat Al - Fatihah"
        ]);

        PelajaranImla::create([
            "pelajaran" => "Menulis Kalimat Sambung Ber-Hukum Mad"
        ]);

        PelajaranImla::create([
            "pelajaran" => "Menulis Kalimat Sambung Ber-Hukum Mim Sukun"
        ]);

        PelajaranImla::create([
            "pelajaran" => "Menulis Kalimat Sambung mengandung Mad"
        ]);
    }
}
