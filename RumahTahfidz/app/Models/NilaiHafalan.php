<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiHafalan extends Model
{
    use HasFactory;

    protected $table = "tb_nilai_hafalan";

    protected $guarded = [''];
}
