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
            "nis" => "29092002",
            "nama_lengkap" => "Mohammad Ilham",
            "nama_panggilan" => "Ilham",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2002-02-02",
            "jenis_kelamin" => "L",
            "alamat" => "Bandung",
            "prestasi_anak" => "Juara 1 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "kode_halaqah" => "HLQSRJ001",
            "id_wali" => 10,
            "id_jenjang" => 1
        ]);

        Santri::create([
            "nis" => "29092003",
            "nama_lengkap" => "Ahmad Budi",
            "nama_panggilan" => "Budi",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2003-03-03",
            "jenis_kelamin" => "L",
            "alamat" => "Papua",
            "prestasi_anak" => "Juara 3 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "kode_halaqah" => "HLQSRJ001",
            "id_wali" => 10,
            "id_jenjang" => 2
        ]);
    }
}
