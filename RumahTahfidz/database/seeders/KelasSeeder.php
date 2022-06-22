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
            "id" => "888608a1-cf4d-4b29-92a8-2eaee696992a",
            "nama_kelas" => "D3TI - 2A"
        ]);

        Kelas::create([
            "id" => "22d40096-ec5e-4de9-ac5c-5f475d2e8c3e",
            "nama_kelas" => "D3TI - 2B"
        ]);

        Kelas::create([
            "id" => "c5731b91-4fe2-4d86-9492-8e2f4cae4587",
            "nama_kelas" => "D3TI - 2C"
        ]);
    }
}
