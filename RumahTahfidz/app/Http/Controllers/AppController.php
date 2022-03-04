<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function layouts()
    {
        return view("app.administrator.layouts.template");
    }
}
