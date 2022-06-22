<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingKategoriTadribat extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_setting_kategori_tadribat";

    protected $guarded = [''];
}
