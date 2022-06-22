<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingIuran extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_setting_iuran";

    protected $guarded  = [''];

    public $timestamps = false;
}
