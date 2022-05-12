<?php

namespace Database\Seeders;

use App\Models\SettingIuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingIuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingIuran::create([
            "mulai" => "10",
            "akhir" => "20"
        ]);
    }
}
