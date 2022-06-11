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
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 2,
            "nama" => "Ahmad Fauzi",
            "email" => "admin@gmail.com",
            "password" => bcrypt("administrator"),
            "alamat" => "Bandung",
            "no_hp" => "002",
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
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 5,
            "nama" => "Riyadi",
            "email" => "data@gmail.com",
            "password" => bcrypt("1234"),
            "alamat" => "Bandung",
            "no_hp" => "004",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 6,
            "nama" => "Mohammad",
            "email" => "mohammad@gmail.com",
            "password" => bcrypt("admincabang"),
            "alamat" => "Cirebon",
            "no_hp" => "1234",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 7,
            "nama" => "Hame",
            "email" => "hame123@gmail.com",
            "password" => bcrypt("admincabang"),
            "alamat" => "Cirebon",
            "no_hp" => "777",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 8,
            "nama" => "Rahul",
            "email" => "rahul@gmail.com",
            "password" => bcrypt("asatidz"),
            "alamat" => "Bandung",
            "no_hp" => "1234567",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-02-02",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 9,
            "nama" => "Ahmad Fauzi",
            "email" => "fauzi@gmail.com",
            "password" => bcrypt("asatidz"),
            "alamat" => "Bandung",
            "no_hp" => "123456",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Jakarta",
            "tanggal_lahir" => "2020-03-03",
            "jenis_kelamin" => "L"
        ]);

        User::create([
            "id" => 10,
            "nama" => "Arif S",
            "email" => "arif@gmail.com",
            "password" => bcrypt("walisantri"),
            "alamat" => "Bali",
            "no_hp" => "29092002",
            "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
            "tempat_lahir" => "Jakarta Raya",
            "tanggal_lahir" => "2020-04-04",
            "jenis_kelamin" => "L"
        ]);
    }
}
