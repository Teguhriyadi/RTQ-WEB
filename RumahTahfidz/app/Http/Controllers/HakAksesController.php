<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use App\Models\Role;
use App\Models\User;
use App\Models\WaliSantri;
use App\Models\Asatidz;
use App\Models\AdminLokasiRt;

use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    public function index($id)
    {
        if ($id == 1) {
            abort(404);
        } else {
            $data = [
                'user' => User::where('id', $id)->first(),
            ];

            return view('app.super_admin.hak_akses.v_index', $data);
        }
    }

    public function store(Request $request)
    {
        $cek_hak_akses = HakAkses::where('id_role', $request->roleId)->where('id_user', $request->userId)->first();

        if ($cek_hak_akses) {
            HakAkses::where('id_role', $request->roleId)->where('id_user', $request->userId)->delete();

            return 1;
        } else {

            $hak_akses = new HakAkses;

            $hak_akses->id_user = $request->userId;
            $hak_akses->id_role = $request->roleId;

            $hak_akses->save();

            if ($request->roleId == 2) {

                AdminLokasiRt::create([
                    "id" => $request->userId
                ]);
            } else if ($request->roleId == 3) {

                Asatidz::create([
                    "id" => $request->userId
                ]);
            } else if ($request->roleId == 4) {

                WaliSantri::create([
                    "id" => $request->userId
                ]);
            }

            return 1;
        }
    }

    public function table($id)
    {
        $data = [
            'user' => User::where('id', $id)->first(),
            'role' => Role::orderBy('id', 'desc')->get()
        ];

        return view('app.super_admin.hak_akses.v_table', $data);
    }
}
