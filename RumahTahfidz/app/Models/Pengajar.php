<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $table = "tb_pengajar";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->hasOne("App\Models\User", "no_hp", "telepon");
    }
}
