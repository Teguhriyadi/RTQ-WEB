<?php

use App\Http\Controllers\Autentikasi\ForgotPasswordController;
use App\Http\Controllers\Autentikasi\LoginController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [LoginController::class, "login"])->middleware("guest");
Route::post("/login", [LoginController::class, "loginProses"]);

Route::put('/hak_akses', [LoginController::class, "hakAkses"]);
Route::post('/hak_akses/{id}', [LoginController::class, "changeHakAkses"]);

Route::get("/forgot-password", [ForgotPasswordController::class, "index"]);
Route::post("/forgot-password", [ForgotPasswordController::class, "store"]);
