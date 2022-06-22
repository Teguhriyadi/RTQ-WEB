<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'id' => Str::uuid(),
            'id_user' => "8fcb1c4b-222d-4857-a138-fa48ce019beb",
            'id_role' => "19dd2155-9d1e-4c50-9b0e-bbede07953a4",
        ]);

        HakAkses::create([
            'id' => Str::uuid(),
            'id_user' => "8fcb1c4b-222d-4857-a138-fa48ce019beb",
            'id_role' => "337740fc-021a-46dd-a2e6-7ad08e76422b",
        ]);
        HakAkses::create([
            'id' => Str::uuid(),
            'id_user' => "8fcb1c4b-222d-4857-a138-fa48ce019beb",
            'id_role' => "cc2503ce-f743-412a-a6b5-925850632807",
        ]);
        HakAkses::create([
            'id' => Str::uuid(),
            'id_user' => "8fcb1c4b-222d-4857-a138-fa48ce019beb",
            'id_role' => "bb2ae906-3904-4d6c-b4cd-1ad59a191978",
        ]);

        HakAkses::create([
            'id' => Str::uuid(),
            "id_user" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
            "id_role" => "cc2503ce-f743-412a-a6b5-925850632807"
        ]);

        HakAkses::create([
            'id' => Str::uuid(),
            "id_user" => "23209209-3923-45f9-8588-f52dd70c52e4",
            "id_role" => "bb2ae906-3904-4d6c-b4cd-1ad59a191978"
        ]);

        HakAkses::create([
            'id' => Str::uuid(),
            "id_user" => "4cd38d80-397a-4665-9dd3-8fb0e234472f",
            "id_role" => "cc2503ce-f743-412a-a6b5-925850632807"
        ]);

        HakAkses::create([
            'id' => Str::uuid(),
            "id_user" => "8d303131-0fd4-4b62-a5ec-955ceb579996",
            "id_role" => "337740fc-021a-46dd-a2e6-7ad08e76422b"
        ]);
    }
}
