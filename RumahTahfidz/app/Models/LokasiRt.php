<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiRt extends Model
{
    use HasFactory;

    protected $table = "tb_lokasi_rt";

    protected $guarded = [''];

    public $timestamps = false;

    public function getHalaqah()
    {
        return $this->hasOne(Halaqah::class, 'kode_rt', 'kode_rt');
    }
}
