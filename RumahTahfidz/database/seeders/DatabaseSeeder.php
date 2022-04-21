<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CabangSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(KategoriPenilaianSeeder::class);
        $this->call(AdminCabangSeeder::class);
        $this->call(WaliSantriSeeder::class);
        $this->call(SantriSeeder::class);
        $this->call(AbsensiSeeder::class);
    }
}
