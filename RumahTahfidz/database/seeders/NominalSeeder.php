<?php

namespace Database\Seeders;

use App\Models\NominalIuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NominalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NominalIuran::create([
            "nominal" => 5000,
            "status" => 1
        ]);
    }
}
