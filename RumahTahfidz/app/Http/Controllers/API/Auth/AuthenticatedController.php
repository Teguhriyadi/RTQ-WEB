<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserDetail;
use App\Models\HakAkses;
use App\Models\Role;
use App\Models\User;
use App\Models\WaliSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke()
    {
        $userId = Auth::user()->id;
        $user = $this->user->with(['getWaliSantri'])->findOrFail($userId);

        return new UserDetail($user);
    }
}
