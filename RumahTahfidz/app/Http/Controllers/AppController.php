<?php

namespace App\Http\Controllers;

use App\Models\LastLogin;
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
            'user_login' => LastLogin::where('id_user', 1)->latest()->limit(4)->get()
        ];

        return view("app.administrator.v_home", $data);
    }
}
