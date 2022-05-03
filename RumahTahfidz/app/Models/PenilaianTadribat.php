<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianTadribat extends Model
{
    use HasFactory;

    protected $table = "tb_penilaian_tadribat";

    protected $guarded = [''];

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }
}