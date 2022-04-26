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
            "jenjang" => "QIRO'AH 1"
        ]);

        Jenjang::create([
            "jenjang" => "QIRO'AH 2"
        ]);

        Jenjang::create([
            "jenjang" => "QIRO'AH 3"
        ]);

        Jenjang::create([
            "jenjang" => "QIRO'AH 4"
        ]);

        Jenjang::create([
            "jenjang" => "I'DADI"
        ]);
    }
}
