<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            "id_santri" => 1,
            "id_status_absen" => 1,
            "keterangan" => "Hadir",
            "id_asatidz" => 9,
            "created_at" => "2022-04-22 17:01:17",
            "updated_at" => "2022-04-22 17:01:17"
        ]);

        Absensi::create([
            "id_santri" => 2,
            "id_status_absen" => 1,
            "keterangan" => "Hadir",
            "id_asatidz" => 9,
            "created_at" => "2022-04-22 17:01:17",
            "updated_at" => "2022-04-22 17:01:17"
        ]);
    }
}
