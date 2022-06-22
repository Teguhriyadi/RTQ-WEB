<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Uuids;

    protected $table = "tb_blog";

    protected $guarded = [''];

    protected $with = ["getKategori"];

    public function getKategori()
    {
        return $this->belongsTo("App\Models\Kategori", "id_kategori", "id")->withDefault(["kategori" => "<i><b>NULL</b></i>"]);
    }

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id_user", "id");
    }
}
