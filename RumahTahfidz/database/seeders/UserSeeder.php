<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "id" => 1,
            "nama" => "Mohammad Ilham",
            "email" => "admin@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "000",
            "id_role" => 1,
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-01-01"
        ]);

        User::create([
            "id" => 2,
            "nama" => "Ahmad Fauzi",
            "email" => "pengajar@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "001",
            "id_role" => 2,
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01"
        ]);
    }
}
