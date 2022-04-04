<?php

use App\Http\Controllers\AdminCabangController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AsatidzController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\StatusAbsenController;
use Illuminate\Support\Facades\Route;

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

                // Data Role
                Route::get("/role/edit", [RoleController::class, "edit"]);
                Route::put("/role/simpan", [RoleController::class, "update"]);
                Route::resource("/role", RoleController::class);

                // Data Jenjang
                Route::get("/jenjang/edit", [JenjangController::class, "edit"]);
                Route::put("jenjang/simpan", [JenjangController::class, "update"]);
                Route::resource("/jenjang", JenjangController::class);

                // Data Cabang
                Route::get("/cabang/edit", [CabangController::class, "edit"]);
                Route::put("/cabang/simpan", [CabangController::class, "update"]);
                Route::resource("/cabang", CabangController::class);

                // Data Admin Cabang
                Route::get("/admin_cabang/edit", [AdminCabangController::class, "edit"]);
                Route::put("/admin_cabang/simpan", [AdminCabangController::class, "update"]);
                Route::resource("/admin_cabang", AdminCabangController::class);

                // Data Status Absen
                Route::get("/status_absen/edit", [StatusAbsenController::class, "edit"]);
                Route::put("/status_absen/simpan", [StatusAbsenController::class, "update"]);
                Route::resource("/status_absen", StatusAbsenController::class);

                // Data Users
                Route::resource("/users", UsersController::class);
            });

            Route::group(["middleware" => ["can:admin"]], function() {

                // Data Siswa
                Route::get("/santri/edit", [SantriController::class, "edit"]);
                Route::put("/santri/simpan", [SantriController::class, "update"]);
                Route::resource("/santri", SantriController::class);
                Route::post("/siswa/import", [ExcelController::class, "importSantri"]);

                // Data Pengajar
                Route::get("/asatidz/edit", [AsatidzController::class, "edit"]);
                Route::put("/asatidz/simpan", [AsatidzController::class, "update"]);
                Route::resource("/asatidz", AsatidzController::class);

                // Data Profil User
                Route::get("/profil_user", [ProfilUserController::class, "index"]);
                Route::put("/profil_user/simpan_gambar_profil", [ProfilUserController::class, "simpan_gambar_profil"]);
                Route::put("/profil_user/ganti_password", [ProfilUserController::class, "ganti_password"]);

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
