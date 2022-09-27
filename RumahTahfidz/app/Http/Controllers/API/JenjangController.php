<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jenjang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JenjangController extends Controller
{
    public function view()
    {
        $cek = Jenjang::get();

        if ($cek->count() < 1) {
            $data = "Data tidak ada.";
        } else {
            $data = $cek;
        }

        return response()->json($data, 200);
    }
}
