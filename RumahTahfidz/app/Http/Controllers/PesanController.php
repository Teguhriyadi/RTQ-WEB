<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $data = [
            "data_pesan" => Pesan::all()
        ];

        return view("app.administrator.pesan.v_index", $data);
    }
}
