<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("app")->group(function() {

    Route::get("/login", [LoginController::class, "login"])->middleware("guest");
    Route::post("/login", [LoginController::class, "loginProses"]);

    Route::get("/forgot-password", [ForgotPasswordController::class, "index"]);
    Route::post("/forgot-password", [ForgotPasswordController::class, "store"]);

    Route::prefix("admin")->group(function() {

        Route::group(["middleware" => "autentikasi"], function() {

            Route::group(["middleware" => ["can:admin"]], function() {
                Route::get("/layouts", [AppController::class, "layouts"]);
                Route::get("/", [AppController::class, "home"]);
                Route::get("/home", [AppController::class, "home"]);
            });

        });
    });

    Route::group(["middleware" => "autentikasi"], function() {
        Route::get("/logout", [LoginController::class, "logout"]);
    });
});
