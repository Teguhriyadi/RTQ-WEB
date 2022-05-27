<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelajaran extends Model
{
    use HasFactory;

    protected $table = "tb_kategori_pelajaran";

    protected $guarded = [''];

    public $timestamps = false;

    public function getJenjang()
    {
        return $this->belongsTo("App\Models\Jenjang", "id_jenjang", "id");
    }

    public function getPelajaran()
    {
        return $this->belongsTo("App\Models\Pelajaran", "id_pelajaran", "id");
    }

    public function getKategoriPenilaian()
    {
        return $this->belongsTo("App\Models\KategoriPenilaian", "id_kategori_penilaian", "id");
    }

    public function getNilai()
    {
        return $this->belongsTo(Nilai::class, 'id_pelajaran', 'id_kategori_pelajaran');
    }
}
