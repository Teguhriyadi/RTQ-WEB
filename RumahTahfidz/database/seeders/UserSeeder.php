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
            "id" => "8fcb1c4b-222d-4857-a138-fa48ce019beb",
            "nama" => "Mohammad Ilham",
            "email" => "super_admin@gmail.com",
            "password" => bcrypt("super_admin"),
            "alamat" => "Bandung",
            "no_hp" => "001",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2020-01-01",
            "jenis_kelamin" => "L"
        ]);

        // User::create([
        //     "id" => "06808f69-f983-4394-964d-dea026cb5d1c",
        //     "nama" => "Ahmad Fauzi",
        //     "email" => "admin@gmail.com",
        //     "password" => bcrypt("administrator"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "002",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "dbb8ec44-780f-4844-bbb0-b695c8d6dff1",
        //     "nama" => "Hamdan",
        //     "email" => "asatidz@gmail.com",
        //     "password" => bcrypt("hame29092002"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "003",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "b19a0e20-5bf8-4f76-b2f5-6523e5974c42",
        //     "nama" => "Riyadi",
        //     "email" => "santri@gmail.com",
        //     "password" => bcrypt("hame29092002"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "004",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "13896c44-7019-40c5-851e-9a4013702f43",
        //     "nama" => "Riyadi",
        //     "email" => "data@gmail.com",
        //     "password" => bcrypt("1234"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "004",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "d8c99e02-9ce1-4912-a77a-54f9bbc95707",
        //     "nama" => "Mohammad",
        //     "email" => "mohammad@gmail.com",
        //     "password" => bcrypt("admincabang"),
        //     "alamat" => "Cirebon",
        //     "no_hp" => "1234",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "8d303131-0fd4-4b62-a5ec-955ceb579996",
        //     "nama" => "Hame",
        //     "email" => "hame123@gmail.com",
        //     "password" => bcrypt("admincabang"),
        //     "alamat" => "Cirebon",
        //     "no_hp" => "777",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Bandung",
        //     "tanggal_lahir" => "2020-01-01",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "c8378462-4f17-4fb4-9ece-956744df8367",
        //     "nama" => "Rahul",
        //     "email" => "rahul@gmail.com",
        //     "password" => bcrypt("asatidz"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "1234567",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Cirebon",
        //     "tanggal_lahir" => "2020-02-02",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
        //     "nama" => "Ahmad Fauzi",
        //     "email" => "fauzi@gmail.com",
        //     "password" => bcrypt("asatidz"),
        //     "alamat" => "Bandung",
        //     "no_hp" => "123456",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Jakarta",
        //     "tanggal_lahir" => "2020-03-03",
        //     "jenis_kelamin" => "L"
        // ]);

        // User::create([
        //     "id" => "23209209-3923-45f9-8588-f52dd70c52e4",
        //     "nama" => "Arif S",
        //     "email" => "arif@gmail.com",
        //     "password" => bcrypt("walisantri"),
        //     "alamat" => "Bali",
        //     "no_hp" => "29092002",
        //     "gambar" => "http://rtq-freelance.my.id/gambar/gambar_user.png",
        //     "tempat_lahir" => "Jakarta Raya",
        //     "tanggal_lahir" => "2020-04-04",
        //     "jenis_kelamin" => "L"
        // ]);
    }
}
