<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilWeb extends Model
{
    use HasFactory;

    protected $table = "tb_profil_web";

    protected $guarded = [""];
}
