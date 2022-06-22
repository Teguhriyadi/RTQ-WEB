<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "id" => "19dd2155-9d1e-4c50-9b0e-bbede07953a4",
            "keterangan" => "Super Admin"
        ]);

        Role::create([
            "id" => "337740fc-021a-46dd-a2e6-7ad08e76422b",
            "keterangan" => "Admin Cabang"
        ]);

        Role::create([
            "id" => "cc2503ce-f743-412a-a6b5-925850632807",
            "keterangan" => "Asatidz"
        ]);

        Role::create([
            "id" => "bb2ae906-3904-4d6c-b4cd-1ad59a191978",
            "keterangan" => "Wali Santri"
        ]);
    }
}
