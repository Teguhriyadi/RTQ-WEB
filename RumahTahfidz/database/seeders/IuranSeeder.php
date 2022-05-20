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
            "id_santri" => 1,
            "nominal" => 50000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => 7,
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);

        Iuran::create([
            "id_santri" => 2,
            "nominal" => 100000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => 7,
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);

        Iuran::create([
            "id_santri" => 2,
            "nominal" => 150000,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "id_status_validasi" => 2,
            "id_users" => 10,
            "created_at" => "2022-05-10 15:15:15",
            "updated_at" => "2022-05-10 15:15:15"
        ]);
    }
}
