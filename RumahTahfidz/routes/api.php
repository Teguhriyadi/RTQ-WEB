<?php

use App\Http\Controllers\API\AbsensiAsatidzController;
use App\Http\Controllers\API\AbsensiSantriController;
use App\Http\Controllers\API\Auth\AuthenticatedController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\LogoutController;
use App\Http\Controllers\API\CabangController;
use App\Http\Controllers\API\IuranController;
use App\Http\Controllers\API\JenjangController;
use App\Http\Controllers\API\KategoriPelajaranController;
use App\Http\Controllers\API\KategoriPenilaianController;
use App\Http\Controllers\API\PenilaianController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\SantriController;
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

// Login
Route::post('login', LoginController::class);

// Role
Route::get('role', [RoleController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Logout
    Route::post('logout', LogoutController::class);

    // Detail User
    Route::get('user/profil', AuthenticatedController::class);

    Route::prefix('kategori')->group(function () {
        // Kategori Pelajaran
        Route::prefix('pelajaran')->group(function () {
            Route::get('/', [KategoriPelajaranController::class, 'index']);
        });

        // Kategori Penilaian
        Route::prefix('penilaian')->group(function () {
            Route::get('/', [KategoriPenilaianController::class, 'index']);
        });
    });

    // Penilaian
    Route::prefix('penilaian')->group(function () {
        Route::get('/', [PenilaianController::class, 'index']);
        Route::post('/', [PenilaianController::class, 'store']);
        Route::get('/{id_pelajaran}/{id_santri}', [PenilaianController::class, 'show']);
        Route::put('/{id}', [PenilaianController::class, 'update']);
    });

    // List Jenjang
    Route::get('jenjang', [JenjangController::class, 'index']);

    // List Cabang
    Route::get('cabang', [CabangController::class, 'index']);

    Route::get('cabang/{kode_rt}', [CabangController::class, 'filter_cabang']);

    // List Santri
    Route::get('santri', [SantriController::class, 'index']);

    Route::prefix('absensi')->group(function () {
        // Absensi Santri
        Route::prefix('santri')->group(function () {
            Route::get("/", [AbsensiSantriController::class, 'index']);
            Route::post("/", [AbsensiSantriController::class, 'store']);
            Route::get("/{id}", [AbsensiSantriController::class, 'show']);
            Route::put("/{id}", [AbsensiSantriController::class, 'update']);
        });


        // Abesensi Asatidz
        Route::prefix('asatidz')->group(function () {
            Route::get('/', [AbsensiAsatidzController::class, 'index']);
            Route::post('/', [AbsensiAsatidzController::class, 'create']);
            Route::get('rekap', [AbsensiAsatidzController::class, 'recap']);
        });
    });


    // Iuran
    Route::prefix('iuran')->group(function () {
        Route::get('/', [IuranController::class, 'index']);
        Route::post('/', [IuranController::class, 'store']);
        Route::get('/{id_santri}', [IuranController::class, 'show']);
    });
});
