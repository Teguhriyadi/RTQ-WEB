<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\HakAkses;
use App\Models\Role;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $hak_akses = HakAkses::where('id', $user->id_hak_akses)->first();
        $role = Role::where('id', $hak_akses->id_role)->first();

        if ($hak_akses->id_role == 3) {
            $user['nik'] = '';
            $user['no_kk'] = '';
        } elseif ($hak_akses->id_role == 4) {
            $wali_santri = WaliSantri::where('id', $user->id)->first();
            $user['nik'] = $wali_santri->nik;
            $user['no_kk'] = $wali_santri->no_kk;
        }

        return response()->json($user);
    }
}
