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
            "kode_halaqah" => "HLQ-001",
            "id_wali" => 4,
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
            "kode_halaqah" => "HLQ-002",
            "id_wali" => 4,
            "id_jenjang" => 2
        ]);

        Santri::create([
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
            "id_wali" => 4,
            "id_jenjang" => 2
        ]);

        Santri::create([
            "nis" => "2003077",
            "nama_lengkap" => "Nandang Eka",
            "nama_panggilan" => "Nan Eps",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2004-03-03",
            "jenis_kelamin" => "L",
            "alamat" => "Papua",
            "prestasi_anak" => "Juara 3 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "kode_halaqah" => "HLQ-002",
            "id_wali" => 5,
            "id_jenjang" => 2
        ]);

        Santri::create([
            "nis" => "2003078",
            "nama_lengkap" => "Hakim Asrori",
            "nama_panggilan" => "Hakim",
            "tempat_lahir" => "Cirebon",
            "tanggal_lahir" => "2004-03-03",
            "jenis_kelamin" => "L",
            "alamat" => "Papua",
            "prestasi_anak" => "Juara 2 Web Technology",
            "sekolah" => "SMK INFORMATIKA AL - IRSYAD AL - ISLAMIYYAH",
            "id_kelas" => 1,
            "kode_halaqah" => "HLQ-003",
            "id_wali" => 6,
            "id_jenjang" => 2
        ]);
    }
}
