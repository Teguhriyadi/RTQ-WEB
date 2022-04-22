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

    public function getCabang()
    {
        return $this->belongsTo("App\Models\Cabang", "id_cabang", "id");
    }
}
