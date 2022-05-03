<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranImanAdab extends Model
{
    use HasFactory;

    protected $table = "tb_pelajaran_iman_dan_adab";

    protected $guarded = [''];

    public $timestamps = false;
}
