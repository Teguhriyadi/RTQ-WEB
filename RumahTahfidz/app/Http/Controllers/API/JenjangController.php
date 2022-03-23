<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenjangController extends Controller
{
    public function index()
    {
        $data = [
            "data_jenjang" => Jenjang::all()
        ];

        return view("app.administrator.jenjang.index", $data);
    }

    public function create()
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }

    public function store(Request $request)
    {
        Jenjang::create($request->all());

        return redirect("/app/sistem/jenjang")->with("message", "");
    }

    public function show($id)
    {
        $data = Jenjang::findOrfail($id);

        return response()->json(['message' => 'Request Success!', 'data' => $data], 200);
    }

    public function edit(Request $request)
    {
        $data = [
            "data_jenjang" => Jenjang::where("id_jenjang", $request->id_jenjang)->first()
        ];

        return view("app.administrator.jenjang.edit", $data);
    }

    public function update(Request $request)
    {
        Jenjang::where("id_jenjang", $request->id_jenjang)->update([
            "jenjang" => $request->jenjang
        ]);

        return redirect("/app/sistem/jenjang");
    }

    public function destroy($id_jenjang)
    {
        echo "Mohammad";
    }
}
