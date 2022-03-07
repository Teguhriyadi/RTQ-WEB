<?php

namespace App\Http\Controllers;

use App\Models\TerakhirLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LastLoginController extends Controller
{
    public function index()
    {
        $data = [
            "data_informasi_login" => TerakhirLogin::where('id_user', Auth::user()->id)->latest()->limit(4)->get()
        ];

        return view("app.administrator.informasi_login.v_index", $data);
    }
}
