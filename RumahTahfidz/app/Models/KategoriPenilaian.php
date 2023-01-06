<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    use HasFactory;

    protected $table = "tb_kategori_penilaian";

    protected $guarded = [''];

    public function getKategoriPelajaran()
    {
        return $this->hasMany(KategoriPelajaran::class, 'id_kategori_penilaian', 'id');
    }
}
