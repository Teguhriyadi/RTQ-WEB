<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\PengajarController;
use App\Http\Controllers\API\AbsensiController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\StatusAbsenController;
use App\Http\Controllers\ProfilController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route Percobaan
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});

Route::get('users', function () {
    $user = User::all();

    return response()->json([
        'message' => 'Response Successful',
        'data' => $user
    ]);
});

// Authentication
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('login_admin', 'loginAdmin');
    Route::post('register', 'register');
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

// Role
Route::resource('role', RoleController::class);

// Siswa
Route::resource('siswa', SiswaController::class);

// Pengajar
Route::resource('pengajar', PengajarController::class);

// Absensi
Route::resource('absensi', AbsensiController::class);

// Status Absen
Route::resource('status_absen', StatusAbsenController::class);

Route::resource('users', UsersController::class);

Route::get('info_profil/{no_hp}', [ProfilController::class, 'info_profil']);
