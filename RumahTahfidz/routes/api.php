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

// Route Percobaan
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return Auth::user();
// });

// Login
Route::post('login', LoginController::class);

// Role
Route::get('role', [RoleController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Logout
    Route::post('logout', LogoutController::class);

    // Detail User
    Route::get('user/profil', AuthenticatedController::class);

    // Kategori Pelajaran
    // Route::prefix('kategori/pelajaran/view')->group(function () {
    //     Route::get('/all', [KategoriPenilaianController::class, 'all']);
    //     Route::get('/{id_jenjang}/{id_katagori}', [KategoriPenilaianController::class, 'show']);
    // });

    // Route::prefix('pelajaran/view')->group(function () {
    //     Route::get('/all', [KategoriPelajaranController::class, 'all']);
    //     Route::get('/{id_kategori_penilaian}/{id_jenjang}', [KategoriPelajaranController::class, 'show']);
    // });

    // Kategori Penilaian
    // Route::prefix('penilaian')->group(function () {
    //     Route::get('view/{id_pelajaran}/{id_santri}', [PenilaianController::class, 'get_nilai']);
    //     Route::get('view/{id_pelajaran}/{id_santri}/{id_kategori}/{id_asatidz}', [PenilaianController::class, 'store_nilai']);
    //     Route::post('store/{id_pelajaran}/{id_santri}/{id_kategori}/{id_asatidz}', [PenilaianController::class, 'store_nilai']);
    //     Route::put('put/{id}/{id_asatidz}', [PenilaianController::class, 'update_nilai']);
    //     Route::get('view/{id_santri}', [PenilaianController::class, 'viewNilaiByWali']);
    // });

    // List Jenjang
    Route::get('jenjang', [JenjangController::class, 'index']);

    // List Cabang
    Route::get('cabang', [CabangController::class, 'index']);

    // List Santri
    Route::get('santri', [SantriController::class, 'index']);
    Route::get('santri/show-by-wali-santri', [SantriController::class, 'showByWaliSantri']);
    Route::get('santri/{halaqah}/{jenjang}', [SantriController::class, 'showHalaqahJenjang']);

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
