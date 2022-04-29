<?php

namespace Database\Seeders;

use App\Models\PelajaranTadribat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranTadribatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PelajaranTadribat::create([
            "pelajaran" => "Mengenal Huruf - Huruf Hijaiyah"
        ]);

        PelajaranTadribat::create([
            "pelajaran" => "Mengenal Harakat Fatihah"
        ]);

        PelajaranTadribat::create([
            "pelajaran" => "Mengenal Tanwin"
        ]);
    }
}
