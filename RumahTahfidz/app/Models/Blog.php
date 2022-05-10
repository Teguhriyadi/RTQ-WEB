<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "tb_blog";

    protected $guarded = [''];

    public $timestamps = false;

    public function getKategori()
    {
        return $this->belongsTo("App\Models\Kategori", "id_kategori", "id")->withDefault(["kategori" => "<i><b>NULL</b></i>"]);
    }
}
