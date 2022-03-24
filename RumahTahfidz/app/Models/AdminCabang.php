<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminCabang extends Model
{
    use HasFactory;

    protected $table = "tb_admin_cabang";

    protected $guarded = [''];
}
