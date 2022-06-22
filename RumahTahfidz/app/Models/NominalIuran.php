<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominalIuran extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_nominal_iuran";

    protected $guarded = [''];

    public $timestamps = false;
}
