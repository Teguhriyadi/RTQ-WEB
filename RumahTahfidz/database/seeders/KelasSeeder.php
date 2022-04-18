<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            "nama_kelas" => "D3TI - 2A"
        ]);

        Kelas::create([
            "nama_kelas" => "D3TI - 2B"
        ]);

        Kelas::create([
            "nama_kelas" => "D3TI - 2C"
        ]);
    }
}
