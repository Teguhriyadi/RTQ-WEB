<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = "tb_nilai";

    protected $guarded = [''];

    public function getKategoriPelajaran()
    {
        return $this->belongsTo("App\Models\KategoriPelajaran", "id_kategori_pelajaran", "id");
    }

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }
}
