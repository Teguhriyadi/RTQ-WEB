<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasHalaqah extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_kelas_halaqah";

    protected $guarded = [""];

    public $timestamps = false;

    public function getAsatidz()
    {
        return $this->belongsTo("App\Models\Asatidz", "id_asatidz", "id");
    }
}
