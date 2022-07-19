<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaqah extends Model
{
    use HasFactory;

    protected $table = "tb_halaqah";

    protected $guarded = [''];

    protected $with = ["getLokasiRt"];

    public function getLokasiRt()
    {
        return $this->belongsTo("App\Models\LokasiRt", "kode_rt", "kode_rt")->withDefault(["lokasi_rt" => "NULL"]);
    }

    public function getSantri()
    {
        return $this->hasMany(Santri::class, 'kode_halaqah', 'kode_halaqah');
    }
}
