<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_kelas";

    protected $guarded = [''];

    public $timestamps = false;
}
