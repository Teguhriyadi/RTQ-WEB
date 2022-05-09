<?php

namespace Database\Seeders;

use App\Models\PelajaranImanAdab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranImanAdabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PelajaranImanAdab::create([
            "pelajaran" => "Hafal 10 Adab"
        ]);

        PelajaranImanAdab::create([
            "pelajaran" => "Definisi Singkat 10 Adab"
        ]);

        PelajaranImanAdab::create([
            "pelajaran" => "Definisi 10 Adab, Contoh & Dalilnya"
        ]);

        PelajaranImanAdab::create([
            "pelajaran" => "Mengetahui Tugas - Tugas Malaikat"
        ]);

        PelajaranImanAdab::create([
            "pelajaran" => "Hafal Rukun Iman"
        ]);
    }
}
