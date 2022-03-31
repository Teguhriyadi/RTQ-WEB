<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCabang extends Model
{
    use HasFactory;

    protected $table = "tb_admin_cabang";

    protected $guarded = [''];

    public function getCabang()
    {
        return $this->belongsTo("App\Models\Cabang", "id_cabang", "id");
    }

    public function getUser()
    {
        return $this->hasOne("App\Models\User", "id", "id");
    }
}
