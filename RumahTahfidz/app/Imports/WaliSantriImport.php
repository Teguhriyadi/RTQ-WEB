<?php

namespace App\Imports;

use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WaliSantriImport implements ToCollection, withHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $data) {

            $double = User::where("nama", $data["nama"])->count();

            if ($double) {
                
            }

            $unix_date = ($data['tanggal_lahir'] - 25569) * 86400;

            $user = User::create([
                "nama" => $data["nama"],
                "email" => $data["email"],
                "password" => bcrypt("walisantri"),
                "alamat" => $data["alamat"],
                "id_role" => 4,
                "no_hp" => $data["no_hp"],
                "gambar" => $data["gambar"],
                "tempat_lahir" => $data["tempat_lahir"],
                "tanggal_lahir" => gmdate("Y-m-d", $unix_date),
                "jenis_kelamin" => $data["jenis_kelamin"],
                "status" => 1
            ]);

            WaliSantri::create([
                "id" => $user->id,
                "no_ktp" => $data["no_ktp"],
                "no_kk" => $data["no_kk"],
                "kode_halaqah" => $data["kode_halaqah"]
            ]);
        }
    }
}
