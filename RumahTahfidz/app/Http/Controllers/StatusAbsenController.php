<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusAbsenController extends Controller
{
    public function index()
    {
        return view("app.administrator.status_absen.v_index");
    }
}
