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
            "keterangan" => "Super Admin"
        ]);

        Role::create([
            "keterangan" => "Admin Cabang"
        ]);

        Role::create([
            "keterangan" => "Asatidz"
        ]);

        Role::create([
            "keterangan" => "Wali Santri"
        ]);
    }
}
