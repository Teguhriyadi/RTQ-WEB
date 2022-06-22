<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Absensi::create([
            "id" => Str::uuid(),
            "id_santri" => Str::uuid(),
            "id_status_absen" => 1,
            "keterangan" => "Hadir",
            "id_asatidz" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
            "created_at" => "2022-04-22 17:01:17",
            "updated_at" => "2022-04-22 17:01:17"
        ]);

        Absensi::create([
            "id" => Str::uuid(),
            "id_santri" => Str::uuid(),
            "id_status_absen" => 1,
            "keterangan" => "Hadir",
            "id_asatidz" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
            "created_at" => "2022-04-22 17:01:17",
            "updated_at" => "2022-04-22 17:01:17"
        ]);
    }
}
