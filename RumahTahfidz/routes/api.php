<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\PengajarController;
use App\Http\Controllers\API\AbsensiController;
use App\Http\Controllers\API\CabangController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\StatusAbsenController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\API\JenjangController;
use App\Http\Controllers\API\MenuController;
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
// Route::middleware('auth:admin_api')->get('/user', function (Request $request) {
//     return Auth::user();
// });

// // Authentication
// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('login_admin', 'loginAdmin');
//     Route::post('register', 'register');
// });

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('logout', [AuthController::class, 'logout']);
// });

// // Role
// Route::resource('role', RoleController::class);

// // Siswa
// Route::get("siswa/{no_hp}", [SiswaController::class, "destroy"]);
// Route::resource('siswa', SiswaController::class);

// // Pengajar
// Route::resource('pengajar', PengajarController::class);

// // Absensi
// Route::resource('absensi', AbsensiController::class);

// // Status Absen
// Route::resource('status_absen', StatusAbsenController::class);

// Route::resource('users', UsersController::class);

// Route::get('info_profil/{no_hp}', [ProfilController::class, 'info_profil']);

// Route::resource("/profil", ProfilController::class);

// Route::resource("/cabang", CabangController::class);

// Route::resource("/jenjang", JenjangController::class);

// Route::resource("/menu", MenuController::class);
