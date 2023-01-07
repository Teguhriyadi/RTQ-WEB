<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 1;

    const ADMIN_CABANG = 2;

    const ASATIDZ = 3;

    const WALI_SANTRI = 4;

    protected $table = "tb_role";

    protected $fillable = ["keterangan"];
}
