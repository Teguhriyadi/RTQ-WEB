<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_administrasi";

    protected $guarded = [''];

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }
}
