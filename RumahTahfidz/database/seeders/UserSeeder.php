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
            "password" => bcrypt("super_admin"),
            "alamat" => "Bandung",
            "no_hp" => "001",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L",
            "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        ]);

        // User::create([
        //     "id" => 2,
        //     "nama" => "Teguhriyadi",
        //     "email" => "rtq123@gmail.com",
        //     "password" => bcrypt("adminlokasirt002"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "002",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L",
        //     "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        // ]);

        // User::create([
        //     "id" => 3,
        //     "nama" => "Sigit",
        //     "email" => "sigit@gmail.com",
        //     "password" => bcrypt("asatidz003"),
        //     "alamat" => "Jakarta",
        //     "no_hp" => "003",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L",
        //     "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        // ]);

        // User::create([
        //     "id" => 4,
        //     "nama" => "Lukman",
        //     "email" => "lukman@gmail.com",
        //     "password" => bcrypt("walisantri004"),
        //     "alamat" => "Jakarta",
        //     "no_hp" => "004",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L",
        //     "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        // ]);

        // User::create([
        //     "id" => 5,
        //     "nama" => "Eko Permana",
        //     "email" => "ekopermana@gmail.com",
        //     "password" => bcrypt("walisantri005"),
        //     "alamat" => "Cirebon",
        //     "no_hp" => "005",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-02-02",
        //     "jenis_kelamin" => "L",
        //     "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        // ]);

        // User::create([
        //     "id" => 6,
        //     "nama" => "Feby Maulana Hendrayatno",
        //     "email" => "feby123@gmail.com",
        //     "password" => bcrypt("walisantri006"),
        //     "alamat" => "Cirebon",
        //     "no_hp" => "006",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-03-03",
        //     "jenis_kelamin" => "L",
        //     "gambar" => "https://rtq-freelance.my.id/gambar/gambar_user.png"
        // ]);
    }
}
