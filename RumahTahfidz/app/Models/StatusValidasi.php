<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusValidasi extends Model
{
    use HasFactory;

    protected $table = "tb_status_validasi";

    protected $guarded = [''];

    public $timestamps = false;
}
