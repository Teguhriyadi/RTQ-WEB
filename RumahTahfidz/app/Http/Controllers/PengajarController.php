<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        return view("app.administrator.pengajar.v_index");
    }
}
