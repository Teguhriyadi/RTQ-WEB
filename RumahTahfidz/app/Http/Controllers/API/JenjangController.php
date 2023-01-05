<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Jenjang\JenjangCollection;
use App\Models\User;
use App\Models\Jenjang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JenjangController extends Controller
{
    protected $jenjang;

    public function __construct(Jenjang $jenjang)
    {
        $this->jenjang = $jenjang;
    }

    public function index()
    {
        $jenjangs = $this->jenjang->all();

        return new JenjangCollection($jenjangs);
    }
}
