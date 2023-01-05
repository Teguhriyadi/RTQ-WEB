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
    // Route::get('profil/user/detail', AuthenticatedController::class);

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
    // Route::get('santri/view/all', [SantriController::class, 'view']);
    // Route::get('santri/view/all/wali-santri', [SantriController::class, 'viewByWaliSantri']);
    // Route::get('santri/view/{kode_halaqah}/{id_jenjang}', [SantriController::class, 'viewByHalaqahNJenjang']);

    // Absensi Santri
    // Route::get("absensi/santri/{id_jenjang}/{kode_halaqah}", [AbsensiSantriController::class, 'index']);
    // Route::post("absensi/santri/{id_jenjang}/{kode_halaqah}", [AbsensiSantriController::class, 'create']);
    // Route::put("absensi/santri/{id}", [AbsensiSantriController::class, 'edit']);
    // Route::get("absensi/santri/{id}", [AbsensiSantriController::class, 'get_status']);

    // Abesensi Asatidz
    // Route::get('absensi/asatidz', [AbsensiAsatidzController::class, 'index']);
    // Route::get('absensi/asatidz/rekap', [AbsensiAsatidzController::class, 'rekap']);
    // Route::post('absensi/asatidz', [AbsensiAsatidzController::class, 'create']);

    // List Detail Iuran
    // Route::get('iuran/detail/{id}', [IuranController::class, 'detail']);
    // Route::get('iuran/cek/nominal/{id_santri}', [IuranController::class, 'cekNominal']);
    // Route::post('iuran/store', [IuranController::class, 'store']);
});
