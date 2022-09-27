<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\HakAkses;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('no_hp', $request->no_hp)->first();

        if (!$user) {
            return response()->json(['message' => 'Your account not registered!'], 404);
        }

        if ($user->status != 1) {
            return response()->json(['message' => 'Your account not active!'], 404);
        }

        $hakAkses = HakAkses::where("id_role", $request->id_role)->where('id_user', $user->id)->first();

        if (!$hakAkses) {
            return response()->json(['message' => 'Your account not have access!'], 404);
        }

        $cekPassword = Hash::check($request->password, $user->password);

        if (!$cekPassword) {
            return response()->json(['message' => 'Your password wrong!'], 404);
        }

        $role = Role::where('id', $hakAkses->id_role)->first();

        $token = $user->createToken('api', [$role]);
        $user->update([
            'id_hak_akses' => $hakAkses->id
        ]);

        Auth::login($user);

        $user['token'] = $token->plainTextToken;
        $user['id_role'] = $role->id;

        $role = str_replace(' ', '_', strtolower($role->keterangan));

        return response()->json($user);
    }
}
