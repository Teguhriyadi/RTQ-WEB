<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPelajaranTadribat extends Model
{
    use HasFactory;

    protected $table = "tb_kategori_pelajaran_tadribat";

    protected $guarded = [''];

    public $timestamps = false;

    public function getPelajaran()
    {
        return $this->belongsTo("App\Models\PelajaranTadribat", "id_pelajaran", "id");
    }
}
