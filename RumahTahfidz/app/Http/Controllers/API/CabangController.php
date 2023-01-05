<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabang\CabangCollection;
use App\Models\User;
use App\Models\Cabang;
use App\Models\Halaqah;
use App\Models\LokasiRt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CabangController extends Controller
{
    protected $halaqah;

    public function __construct(Halaqah $halaqah)
    {
        $this->halaqah = $halaqah;
    }

    public function index()
    {
        $halaqah = $this->halaqah->all();

        return new CabangCollection($halaqah);
    }
}
