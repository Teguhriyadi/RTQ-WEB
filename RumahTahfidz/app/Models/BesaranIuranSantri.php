<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesaranIuranSantri extends Model
{
    use HasFactory;

    protected $table = "tb_besaran_iuran_santri";

    protected $guarded = [''];

    public function getBesaran()
    {
        return $this->belongsTo("App\Models\BesaranIuran", "id_besaran", "id");
    }

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }
}
