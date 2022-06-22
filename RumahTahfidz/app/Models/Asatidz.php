<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asatidz extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_asatidz";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id", "id");
    }
}
