<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiAsatidz extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_absensi_asatidz";

    protected $guarded = [''];

    public function getAsatidz()
    {
        return $this->belongsTo("App\Models\Asatidz", 'id_asatidz', 'id');
    }
}
