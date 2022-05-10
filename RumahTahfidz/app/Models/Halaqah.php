<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaqah extends Model
{
    use HasFactory;

    protected $table = "tb_halaqah";

    protected $guarded = [''];

    public $timestamps = false;

    public function getLokasiRt()
    {
        return $this->belongsTo("App\Models\LokasiRt", "kode_rt", "kode_rt")->withDefault(["lokasi_rt" => "<i><b>NULL</b></i>"]);
    }

    public function getSantri()
    {
        return $this->hasMany(Santri::class, 'kode_halaqah', 'kode_halaqah');
    }
}
