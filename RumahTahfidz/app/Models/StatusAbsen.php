<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusAbsen extends Model
{
    use HasFactory;

    protected $table = "tb_status_absen";

    protected $fillable = ["keterangan"];

    public $timestamps = false;

}
