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
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "status_validasi" => 2,
            "id_users" => 7
        ]);

        Iuran::create([
            "id_santri" => 2,
            "tanggal" => date(now()),
            "bukti" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "status_validasi" => 2,
            "id_users" => 7
        ]);

    }
}
