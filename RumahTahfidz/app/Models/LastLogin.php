<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastLogin extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_last_Login";

    protected $guarded = [''];

    protected $with = "getUser";

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id_user", "id");
    }
}
