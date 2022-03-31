<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asatidz extends Model
{
    use HasFactory;

    protected $table = "tb_asatidz";

    protected $guarded = [''];

    public function getUser()
    {
        return $this->hasOne("App\Models\User", "id", "id");
    }

}
