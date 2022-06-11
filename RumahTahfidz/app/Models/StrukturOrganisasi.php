<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = "tb_struktur_organisasi";

    protected $guarded = [''];

    public function getJabatan()
    {
        return $this->belongsTo("App\Models\Jabatan", "id_jabatan", "id");
    }
}
