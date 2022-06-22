<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenjang::create([
            "id" => "7f19aa69-c919-495c-aaa2-339e2ffd9718",
            "jenjang" => "QIRO'AH 1"
        ]);

        Jenjang::create([
            "id" => "0f36f654-bb47-466d-83b1-0d05dea8fa41",
            "jenjang" => "QIRO'AH 2"
        ]);

        Jenjang::create([
            "id" => "513b3402-f2b4-49c9-97fa-8fb3178e9a31",
            "jenjang" => "QIRO'AH 3"
        ]);

        Jenjang::create([
            "id" => "d2612001-f7ee-43c8-be9c-6ae83cb887b5",
            "jenjang" => "QIRO'AH 4"
        ]);

        Jenjang::create([
            "id" => "619ee816-b1a8-4e58-abd4-ea8a50fc1d83",
            "jenjang" => "I'DADI"
        ]);
    }
}
