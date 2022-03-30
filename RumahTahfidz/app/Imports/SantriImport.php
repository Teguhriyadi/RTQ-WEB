<?php

namespace App\Imports;

use App\Models\Role;
use App\Models\Siswa;
use App\Models\User;
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

            Siswa::create([
                'nama' => $col['nama'],
                'jenis_kelamin' => $col['jenis_kelamin'],
                'alamat' => $col['alamat'],
                'gambar' => $col['gambar'],
                'nama_ayah' => $col['nama_ayah'],
                'nama_ibu' => $col['nama_ibu'],
                'no_hp' => $col['no_hp'],
            ]);

            User::create([
                'id' => $col['id'],
                'nama' => $col['nama'],
                'email' => $col['email'],
                'password' => bcrypt($col['password']),
                'alamat' => $col['alamat'],
                'id_role' => $role->id,
                'no_hp' => $col['no_hp'],
                'gambar' => $col['gambar'],
                'tempat_lahir' => $col['tempat_lahir'],
                'tanggal_lahir' => gmdate("Y-m-d", $unix_date),
            ]);
        }
    }
}
