<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiTadribat extends Model
{
    use HasFactory;

    protected $table = "tb_nilai_tadribat";

    protected $guarded = [''];

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }

    public function getPelajaran()
    {
        return $this->belongsTo("App\Models\KategoriPelajaranTadribat", "id_pelajaran_tadribat", "id");
    }
}
