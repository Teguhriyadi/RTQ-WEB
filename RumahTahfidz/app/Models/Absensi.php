<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = "tb_absensi";

    protected $guarded = ['created_at', 'updated_at'];

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }

    public function getPengajar()
    {
        return $this->hasOne(Pengajar::class, "id", "id_pengajar");
    }

    public function getStatusAbsen()
    {
        return $this->hasOne(StatusAbsen::class, "id", "status_absen");
    }
}
