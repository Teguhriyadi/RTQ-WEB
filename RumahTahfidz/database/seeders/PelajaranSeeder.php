<?php

namespace Database\Seeders;

use App\Models\Pelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelajaran::create([
            "nama_pelajaran" => "Membaca Bismillah"
        ]);

        Pelajaran::create([
            "nama_pelajaran" => "Membaca Tasbih"
        ]);

        Pelajaran::create([
            "nama_pelajaran" => "Membaca Surat"
        ]);

        Pelajaran::create([
            "nama_pelajaran" => "Belajar"
        ]);

        Pelajaran::create([
            "nama_pelajaran" => "Mengaji"
        ]);
        
    }
}
