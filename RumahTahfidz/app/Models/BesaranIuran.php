<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BesaranIuran extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_besaran_iuran";

    protected $guarded = [''];
}
