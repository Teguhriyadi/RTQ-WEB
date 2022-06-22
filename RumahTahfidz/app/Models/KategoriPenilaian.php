<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_kategori_penilaian";

    protected $guarded = [''];

    public $timestamps = false;
}
