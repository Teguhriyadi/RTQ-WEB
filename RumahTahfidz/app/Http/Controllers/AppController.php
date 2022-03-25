<?php

namespace App\Http\Controllers;

use App\Models\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function layouts()
    {
        return view("app.administrator.layouts.template");
    }

    public function home()
    {
        $data = [
            "user_login" => TerakhirLogin::where("id_user", auth()->user()->id)->get()
        ];

        return view("app.administrator.v_home", $data);
    }
}
