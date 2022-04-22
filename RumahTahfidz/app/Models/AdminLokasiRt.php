<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLokasiRt extends Model
{
    use HasFactory;

    protected $table = "tb_admin_lokasi_rt";

    protected $guarded = [''];

    public function getLokasiRt()
    {
        return $this->belongsTo("App\Models\LokasiRt", "kode_rt", "kode_rt");
    }

    public function getUser()
    {
        return $this->hasOne("App\Models\User", "id", "id");
    }
}
