<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerakhirLogin extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_last_login";

    protected $guarded = [''];
}
