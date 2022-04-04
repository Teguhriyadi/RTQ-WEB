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
            "email" => "super_admin@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "001",
            "id_role" => 1,
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 2,
            "nama" => "Ahmad Fauzi",
            "email" => "admin@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "002",
            "id_role" => 2,
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 3,
            "nama" => "Hamdan",
            "email" => "asatidz@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "003",
            "id_role" => 3,
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 4,
            "nama" => "Riyadi",
            "email" => "santri@gmail.com",
            "password" => bcrypt("hame29092002"),
            "alamat" => "Bandung",
            "no_hp" => "004",
            "id_role" => 4,
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

    }
}
