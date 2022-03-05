<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "tb_siswa";

    protected $guarded = ["created_at", "updated_at"];

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "no_hp", "no_hp");
    }
}
