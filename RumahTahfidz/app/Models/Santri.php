<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = "tb_santri";

    protected $guarded = [''];

    public function getWali()
    {
        return $this->belongsTo("App\Models\WaliSantri", "id_wali", "id");
    }

    public function getKelas()
    {
        return $this->belongsTo("App\Models\Kelas", "id_kelas", "id");
    }

    public function getJenjang()
    {
        return $this->belongsTo(Jenjang::class, "id_jenjang", "id");
    }
}
