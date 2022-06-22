<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_role";

    public $timestamps = false;

    protected $guarded = [""];
}
