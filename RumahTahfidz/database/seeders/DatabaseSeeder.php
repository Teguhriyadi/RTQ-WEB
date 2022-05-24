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
        $this->call(AbsensiSeeder::class);
        $this->call(IuranSeeder::class);
        $this->call(StatusValidasiSeeder::class);
        $this->call(SettingIuranSeeder::class);
        $this->call(PelajaranSeeder::class);
        $this->call(KategoriPelajaranSeeder::class);
        $this->call(NilaiSeeder::class);
    }
}
