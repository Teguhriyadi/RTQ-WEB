<?php

namespace Database\Seeders;

use App\Models\PelajaranHafalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranHafalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PelajaranHafalan::create([
            "nama_surat" => "Al - Fatihah"
        ]);

        PelajaranHafalan::create([
            "nama_surat" => "Al - Ikhlas"
        ]);

        PelajaranHafalan::create([
            "nama_surat" => "Al - Buruj"
        ]);
    }
}
