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
        $this->call(LokasiRtSeeder::class);
        $this->call(HalaqahSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(JenjangSeeder::class);
        $this->call(KategoriPenilaianSeeder::class);
        $this->call(AdminLokasiRtSeeder::class);
        $this->call(AsatidzSeeder::class);
        $this->call(WaliSantriSeeder::class);
        $this->call(SantriSeeder::class);
    }
}
