<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LastLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\StatusAbsenController;
use App\Models\Role;
use Illuminate\Auth\Events\Login;
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

Route::prefix("app")->group(function() {

    Route::get("/login", [LoginController::class, "login"])->middleware("guest");
    Route::post("/login", [LoginController::class, "loginProses"]);

    Route::get("/forgot-password", [ForgotPasswordController::class, "index"]);
    Route::post("/forgot-password", [ForgotPasswordController::class, "store"]);

    Route::prefix("admin")->group(function() {

        Route::group(["middleware" => "autentikasi"], function() {

            Route::get("/home", [AppController::class, "home"]);
            Route::group(["middleware" => ["can:admin"]], function() {

                Route::get("/", [AppController::class, "home"]);

                Route::get("/informasi_login", [LastLoginController::class, "index"]);

                Route::get("/role", [RoleController::class, "index"]);

                Route::get("/siswa", [SiswaController::class, "index"]);

                Route::get("/pengajar", [PengajarController::class, "index"]);

                Route::get("/status_absen", [StatusAbsenController::class, "index"]);

                Route::get("/profil", [ProfilController::class, "web_profil"]);
            });

        });
    });

    Route::group(["middleware" => "autentikasi"], function() {
        Route::get("/logout", [LoginController::class, "logout"]);
    });
});
