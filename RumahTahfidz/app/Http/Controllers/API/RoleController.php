<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Role;

class RoleController extends Controller
{
    public function view()
    {
        $role = Role::all();

        if ($role->count() > 0) {
            $d = [];
            foreach ($role as $c) {
                $d[] = [
                    "id" => $c->id,
                    "keterangan" => $c->keterangan
                ];
            }
            return response()->json($d, 200);
        } else {
            $d2 = 'null';
            return response()->json($d2, 200);
        }
    }
}
