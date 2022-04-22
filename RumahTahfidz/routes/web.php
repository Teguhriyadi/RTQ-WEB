<?php

use App\Http\Controllers\AdminCabangController;
use App\Http\Controllers\AdminLokasiRtController;
use App\Http\Controllers\API\AbsensiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AsatidzController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HalaqahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiRtController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\StatusAbsenController;
use App\Http\Controllers\WaliSantriController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", [LandingPageController::class, "home"]);
Route::get("/home", [LandingPageController::class, "home"]);
Route::get("/kontak", [LandingPageController::class, "kontak"]);
Route::post("/kirim_pesan", [LandingPageController::class, "kirim_pesan"]);

Route::prefix("app")->group(function() {

    Route::get("/theme", function() {
        return view("app.layouts.template");
    });

    Route::get("/login", [LoginController::class, "login"])->middleware("guest");
    Route::post("/login", [LoginController::class, "loginProses"]);

    Route::get("/forgot-password", [ForgotPasswordController::class, "index"]);
    Route::post("/forgot-password", [ForgotPasswordController::class, "store"]);

    Route::prefix("sistem")->group(function() {

        Route::group(["middleware" => "autentikasi"], function() {
            Route::group(["middleware" => ["can:super_admin"]], function() {

                // Data Kelas
                Route::get("/kelas/edit", [KelasController::class, "edit"]);
                Route::put("/kelas/simpan", [KelasController::class, "update"]);
                Route::resource("/kelas", KelasController::class);

                // Data Role
                Route::get("/role/edit", [RoleController::class, "edit"]);
                Route::put("/role/simpan", [RoleController::class, "update"]);
                Route::resource("/role", RoleController::class);

                // Data Jenjang
                Route::get("/jenjang/edit", [JenjangController::class, "edit"]);
                Route::put("jenjang/simpan", [JenjangController::class, "update"]);
                Route::resource("/jenjang", JenjangController::class);

                // Data Cabang
                Route::get("/lokasi_rt/edit", [LokasiRtController::class, "edit"]);
                Route::put("/lokasi_rt/simpan", [LokasiRtController::class, "update"]);
                Route::delete("/lokasi_rt/{kode_rt}", [LokasiRtController::class, "destroy"]);
                Route::resource("/lokasi_rt", LokasiRtController::class);

                // Data Halaqah
                Route::get("/halaqah/edit", [HalaqahController::class, "edit"]);
                Route::put("/halaqah/simpan", [HalaqahController::class, "update"]);
                Route::delete("/halaqah/{kode_halaqah}", [HalaqahController::class, "destroy"]);
                Route::resource("/halaqah", HalaqahController::class);

                // Data Admin Cabang
                Route::get("/admin_lokasi_rt/edit", [AdminLokasiRtController::class, "edit"]);
                Route::put("/admin_lokasi_rt/simpan", [AdminLokasiRtController::class, "update"]);
                Route::resource("/admin_lokasi_rt", AdminLokasiRtController::class);

                // Data Status Absen
                Route::get("/status_absen/edit", [StatusAbsenController::class, "edit"]);
                Route::put("/status_absen/simpan", [StatusAbsenController::class, "update"]);
                Route::resource("/status_absen", StatusAbsenController::class);

                // Data Users
                Route::post("/users/non_aktifkan/", [UsersController::class, "non_aktifkan"]);
                Route::resource("/users", UsersController::class);
            });

            Route::group(["middleware" => ["can:admin"]], function() {

                // Data Siswa
                Route::get("/santri/edit", [SantriController::class, "edit"]);
                Route::put("/santri/simpan", [SantriController::class, "update"]);
                Route::get("/santri/tambah_data_santri", [SantriController::class, "tambah_data_santri"]);
                Route::post("/santri/tambah_santri_by_wali", [SantriController::class, "tambah_santri_by_wali"]);
                Route::resource("/santri", SantriController::class);

                Route::post("/siswa/import", [ExcelController::class, "importSantri"]);

                // Data Pengajar
                Route::get("/asatidz/edit/{id}", [AsatidzController::class, "edit"]);
                Route::put("/asatidz/simpan", [AsatidzController::class, "update"]);
                Route::resource("/asatidz", AsatidzController::class);

                Route::get("/wali_santri/edit", [WaliSantriController::class, "edit"]);
                Route::put("/wali_santri/simpan", [WaliSantriController::class, "update"]);
                Route::resource("/wali_santri", WaliSantriController::class);

                // Data Profil User
                Route::get("/profil_user", [ProfilUserController::class, "index"]);
                Route::put("/profil_user/simpan_gambar_profil", [ProfilUserController::class, "simpan_gambar_profil"]);
                Route::put("/profil_user/ganti_password", [ProfilUserController::class, "ganti_password"]);

            });

            Route::group(["middleware" => ["can:asatidz"]], function() {

                // Data Absensi Santri
                Route::get("/input_absensi_santri", [AbsensiController::class, "input_absensi_santri"]);
                Route::get("/absensi_santri", [AbsensiController::class, "absensi_santri"]);
            });

            Route::get("/home", [AppController::class, "home"]);

            Route::get("/", [AppController::class, "home"]);

            Route::get("/informasi_login", [LastLoginController::class, "index"]);

            Route::get("/profil", [ProfilController::class, "web_profil"]);

            Route::get("/pesan", [PesanController::class, "index"]);

        });
    });

    Route::group(["middleware" => "autentikasi"], function() {
        Route::get("/logout", [LoginController::class, "logout"]);
    });
});

Route::get('coba', function () {
    return view('coba');
});
