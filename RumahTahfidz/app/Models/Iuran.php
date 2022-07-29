<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $table = "tb_iuran";

    protected $guarded = [''];

    protected $with = ['getSantri', 'getStatusValidasi'];

    public function getSantri()
    {
        return $this->belongsTo("App\Models\Santri", "id_santri", "id");
    }

    public function getStatusValidasi()
    {
        return $this->belongsTo("App\Models\StatusValidasi", "id_status_validasi", "id");
    }
}
