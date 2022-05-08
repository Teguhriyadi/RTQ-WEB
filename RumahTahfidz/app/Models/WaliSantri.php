<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSantri extends Model
{
    use HasFactory;

    protected $table = "tb_wali_santri";

    protected $guarded = [''];

    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id", "id")->withDefault(["nama" => ""]);
    }

    public function getHalaqah()
    {
        return $this->belongsTo("App\Models\Halaqah", "kode_halaqah", "kode_halaqah");
    }
}
