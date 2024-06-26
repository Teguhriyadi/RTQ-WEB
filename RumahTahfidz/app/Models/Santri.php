<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $table = "tb_santri";

    protected $guarded = [''];

    protected $with = ["getWali", "getJenjang"];

    public function getWali()
    {
        return $this->belongsTo("App\Models\WaliSantri", "id_wali", "id")->withDefault(["getUser" => ""]);
    }

    public function getKelas()
    {
        return $this->belongsTo("App\Models\Kelas", "id_kelas", "id")->withDefault(["nama_kelas" => "-"]);
    }

    public function getJenjang()
    {
        return $this->belongsTo(Jenjang::class, "id_jenjang", "id");
    }

    public function getIuran()
    {
        return $this->belongsTo("App\Models\Iuran", "id", "id_santri");
    }

    public function getHalaqah()
    {
        return $this->hasOne(Halaqah::class, 'kode_halaqah', 'kode_halaqah');
    }

    public function getNominalIuran()
    {
        return $this->belongsTo("App\Models\NominalIuran", "id_nominal_iuran", "id");
    }

    public function getBesaranIuran()
    {
        return $this->belongsTo("App\Models\BesaranIuran", "id_besaran", "id")->withDefault(["besaran" => "NULL"]);
    }

    public function getAbsensi()
    {
        return $this->hasMany("App\Models\Absensi", "id_santri", "id");
    }
}
