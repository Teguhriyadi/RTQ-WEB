<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranTadribat extends Model
{
    use HasFactory;

    protected $table = "tb_pelajaran_tadribat";

    protected $guarded = [''];

    public $timestamps = false;
}
