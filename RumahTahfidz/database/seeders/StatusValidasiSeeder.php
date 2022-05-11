<?php

namespace Database\Seeders;

use App\Models\StatusValidasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusValidasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusValidasi::create([
            "status" => "Sudah di validasi asatidz"
        ]);

        StatusValidasi::create([
            "status" => "Sudah di validasi admin cabang"
        ]);

        StatusValidasi::create([
            "status" => "Sudah di validasi super admin"
        ]);

        StatusValidasi::create([
            "status" => "Tervalidasi"
        ]);
    }
}
