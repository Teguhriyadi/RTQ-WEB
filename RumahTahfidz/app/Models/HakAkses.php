<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;

    protected $table = 'tb_hak_akses';

    protected $guarded = [''];

    public $timestamps = false;

    public function getRole()
    {
        return $this->belongsTo(Role::class, "id_role", "id")->withDefault(["keterangan" => "<i><b>NULL</b></i>"]);
    }
}
