<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranMulok extends Model
{
    use HasFactory;

    protected $table = "tb_pelajaran_mulok";

    protected $guarded = [''];

    public $timestamps = false;
}
