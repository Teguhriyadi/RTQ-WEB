<?php

namespace Database\Seeders;

use App\Models\BesaranIuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BesaranIuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BesaranIuran::create([
            "besaran" => 10000
        ]);

        BesaranIuran::create([
            "besaran" => 50000  
        ]);
    }
}
