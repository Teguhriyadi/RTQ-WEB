<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function layouts()
    {
        return view("app.landing.layouts.template");
    }

    public function home()
    {
        return view("app.landing.v_home");
    }

    public function kontak()
    {
        return view("app.landing.kontak.v_index");
    }
}
