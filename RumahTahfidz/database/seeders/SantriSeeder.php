<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            "id" => "f9de63cc-1001-45a2-89c6-6adb97e8ed7e",
            "nis" => "29092002",
            "nama_lengkap" => "Mohammad Ilham",
            "nama_panggilan" => "Ilham",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2002-02-02",
            "jenis_kelamin" => "L",
            "alamat" => "Bandung",
            "prestasi_anak" => "Juara 1 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => "c5731b91-4fe2-4d86-9492-8e2f4cae4587",
            "kode_halaqah" => "HLQ-001",
            "id_wali" => "23209209-3923-45f9-8588-f52dd70c52e4",
            "id_jenjang" => "619ee816-b1a8-4e58-abd4-ea8a50fc1d83"
        ]);

        Santri::create([
            "id" => "37c333e3-2ebc-467d-9d2b-b886af344ad5",
            "nis" => "29092003",
            "nama_lengkap" => "Ahmad Budi",
            "nama_panggilan" => "Budi",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2003-03-03",
            "jenis_kelamin" => "L",
            "alamat" => "Papua",
            "prestasi_anak" => "Juara 3 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => "c5731b91-4fe2-4d86-9492-8e2f4cae4587",
            "kode_halaqah" => "HLQ-002",
            "id_wali" => "23209209-3923-45f9-8588-f52dd70c52e4",
            "id_jenjang" => "619ee816-b1a8-4e58-abd4-ea8a50fc1d83"
        ]);

        Santri::create([
            "id" => "47b7d674-b0e4-426a-b6ea-80c8701ee54f",
            "nis" => "29092004",
            "nama_lengkap" => "Ahmad Fauzi",
            "nama_panggilan" => "Fauzi Hendrayatno",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2003-03-03",
            "jenis_kelamin" => "L",
            "alamat" => "Papua",
            "prestasi_anak" => "Juara 3 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "kode_halaqah" => "HLQ-003",
            "id_wali" => "23209209-3923-45f9-8588-f52dd70c52e4",
            "id_jenjang" => "619ee816-b1a8-4e58-abd4-ea8a50fc1d83"
        ]);
    }
}
