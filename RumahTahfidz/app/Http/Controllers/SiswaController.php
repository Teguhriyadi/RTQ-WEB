<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            "data_santri" => Siswa::orderBy("id")->get()
        ];

        return view("app.administrator.siswa.v_index", $data);
    }
}
