<?php

namespace Database\Seeders;

use App\Models\Iuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Iuran::create([
            "id_santri" => "f9de63cc-1001-45a2-89c6-6adb97e8ed7e",
            "nominal" => 50000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => "8d303131-0fd4-4b62-a5ec-955ceb579996",
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);

        Iuran::create([
            "id_santri" => "37c333e3-2ebc-467d-9d2b-b886af344ad5",
            "nominal" => 100000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => "8d303131-0fd4-4b62-a5ec-955ceb579996",
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);

        Iuran::create([
            "id_santri" => "37c333e3-2ebc-467d-9d2b-b886af344ad5",
            "nominal" => 150000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => "23209209-3923-45f9-8588-f52dd70c52e4",
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);
    }
}
