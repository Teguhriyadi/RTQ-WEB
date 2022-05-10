<?php

namespace App\Imports;

use App\Models\Halaqah;
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
            $cabang = Halaqah::where('kode_halaqah', Str::headline($col['kode_halaqah']))->first();
            $user = User::where("nama", Str::headline($col["nama_wali"]))->first();

            Santri::create([
                "nis" => $col['nis'],
                "nama_lengkap" => $col['nama_lengkap'],
                "nama_panggilan" => $col['nama_panggilan'],
                "tempat_lahir" => $col['tempat_lahir'],
                "tanggal_lahir" => gmdate("Y-m-d", $unix_date),
                'jenis_kelamin' => $col['jenis_kelamin'],
                'alamat' => $col['alamat'],
                "prestasi_anak" => $col['prestasi_anak'],
                "sekolah" => $col['sekolah'],
                "id_kelas" => $col['id_kelas'],
                "kode_halaqah" => $col['kode_halaqah'],
                "id_wali" => $user->id,
                "id_jenjang" => $col['id_jenjang'],
                "status" => $col['status'],
                'foto' => $col['foto']
            ]);

            // User::create([
            //     'id' => $col['id'],
            //     'nama' => $col['nama'],
            //     'email' => $col['email'],
            //     'password' => bcrypt($col['password']),
            //     'alamat' => $col['alamat'],
            //     'id_role' => $role->id,
            //     'no_hp' => $col['no_hp'],
            //     'id_cabang' => $cabang->id,
            //     'gambar' => $col['gambar'],
            //     'tempat_lahir' => $col['tempat_lahir'],
            //     'tanggal_lahir' => gmdate("Y-m-d", $unix_date),
            // ]);
        }
    }
}
