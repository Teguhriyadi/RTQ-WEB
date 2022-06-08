<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesaranIuran extends Model
{
    use HasFactory;

    protected $table = "tb_besaran_iuran";

    protected $guarded = [''];
}
