<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranHafalan extends Model
{
    use HasFactory;

    protected $table = "tb_pelajaran_hafalan";

    protected $guarded = [''];

    public $timestamps = false;
}
