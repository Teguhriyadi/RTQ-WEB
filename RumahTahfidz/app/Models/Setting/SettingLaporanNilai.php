<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingLaporanNilai extends Model
{
    use HasFactory;

    protected $table = "tb_setting_laporan_nilai";

    protected $guarded = [''];
}
