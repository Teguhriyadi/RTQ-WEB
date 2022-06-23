<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HakAkses::create([
            'id_user' => 1,
            'id_role' => 1,
        ]);

        HakAkses::create([
            "id_user" => 2,
            "id_role" => 2,
        ]);

        HakAkses::create([
            "id_user" => 3,
            "id_role" => 3,
        ]);

        HakAkses::create([
            "id_user" => 4,
            "id_role" => 4,
        ]);
    }
}
