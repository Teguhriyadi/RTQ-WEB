<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\Jenjang\Search;
use App\Http\Resources\Jenjang\JenjangCollection;
use App\Models\User;
use App\Models\Jenjang;

use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
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
        $jenjang = app(Pipeline::class)
            ->send(Jenjang::query())
            ->through([
                Search::class
            ])
            ->thenReturn()
            ->get();

        return new JenjangCollection($jenjang);
    }
}
