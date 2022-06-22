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
    }
}
