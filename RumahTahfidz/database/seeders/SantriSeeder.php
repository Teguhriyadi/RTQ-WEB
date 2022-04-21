<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Santri::create([
            "nama_lengkap" => "Mohammad Ilham",
            "nama_panggilan" => "Ilham",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2002-02-02",
            "alamat" => "Bandung",
            "prestasi_anak" => "Juara 1 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "id_cabang" => 1,
            "id_wali" => 1,
            "id_jenjang" => 1
        ]);

        Santri::create([
            "nama_lengkap" => "Mohammad Fauzi",
            "nama_panggilan" => "Fauzi",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2002-03-03",
            "alamat" => "Cirebon",
            "prestasi_anak" => "Juara 1 Web Design",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "id_cabang" => 1,
            "id_wali" => 1,
            "id_jenjang" => 1
        ]);

        Santri::create([
            "nama_lengkap" => "Mohammad Ali",
            "nama_panggilan" => "Ali",
            "tempat_lahir" => "Jakarta",
            "tanggal_lahir" => "2002-04-04",
            "alamat" => "Bekasi",
            "prestasi_anak" => "Juara 1 Lomba KKSI",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 2,
            "id_cabang" => 2,
            "id_wali" => 2,
            "id_jenjang" => 1
        ]);
    }
}
