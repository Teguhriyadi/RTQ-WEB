<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        return view("app.administrator.jenjang.v_index");
    }
}
