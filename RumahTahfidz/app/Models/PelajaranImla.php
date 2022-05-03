<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranImla extends Model
{
    use HasFactory;

    protected $table = "tb_pelajaran_imla";

    protected $guarded = [''];

    public $timestamps = false;
}