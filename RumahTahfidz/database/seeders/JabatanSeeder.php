<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            "nama_jabatan" => "Pembina"
        ]);

        Jabatan::create([
            "nama_jabatan" => "Sekretaris"
        ]);
    }
}
