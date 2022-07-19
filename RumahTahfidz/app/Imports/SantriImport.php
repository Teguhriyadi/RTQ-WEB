<?php

namespace App\Imports;

use App\Models\HakAkses;
use App\Models\Halaqah;
use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\Santri;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantriImport implements ToCollection, withHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $col) {
            $unix_date = ($col['tanggal_lahir'] - 25569) * 86400;

            $role = Role::where('keterangan', Str::headline($col['role']))->first();
            $kelas = Kelas::where('nama_kelas', Str::headline($col['kelas']))->first();
            $jenjang = Jenjang::where('jenjang', Str::headline($col['jenjang']))->first();
            $user = User::where("nama", Str::headline($col["nama_wali"]))->first();

            if ($user == null) {
                $user = User::create([
                    'nama' => Str::headline($col['nama_wali']),
                    'email' => Str::headline($col['email_wali']),
                    'no_hp' => Str::headline($col['no_hp']),
                    'password' => bcrypt("walisantri" . $col['no_hp']),
                    'tempat_lahir' => "-",
                    'jenis_kelamin' => Str::headline($col['jenis_kelamin_wali']),
                ]);

                WaliSantri::create([
                    'id' => $user->id,
                    'no_ktp' => Str::headline($col['nik_wali']),
                    'no_kk' => Str::headline($col['kk_wali']),
                    'pekerjaan' => Str::headline($col['pekerjaan_wali']),
                ]);

                HakAkses::create([
                    'id_user' => $user->id,
                    'id_role' => 4
                ]);
            }

            Santri::create([
                "nis" => Str::headline($col['nis']),
                "nama_lengkap" => Str::headline($col['nama_lengkap']),
                "nama_panggilan" => Str::headline($col['nama_panggilan']),
                "tempat_lahir" => Str::headline($col['tempat_lahir']),
                "tanggal_lahir" => gmdate("Y-m-d", $unix_date),
                'jenis_kelamin' => $col['jenis_kelamin'],
                'alamat' => Str::headline($col['alamat']),
                "prestasi_anak" => Str::headline($col['prestasi_anak']),
                "sekolah" => Str::headline($col['sekolah']),
                "id_kelas" => 0,
                "kode_halaqah" => Str::headline($col['kode_halaqah']),
                "id_wali" => $user->id,
                "id_jenjang" => 0,
                "status" => Str::headline($col['status']) == "Aktif" ? 0 : 1,
                'foto' => Str::headline($col['foto'])
            ]);
        }
    }
}
