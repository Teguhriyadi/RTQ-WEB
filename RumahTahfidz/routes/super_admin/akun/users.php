<?php

use App\Http\Controllers\Public\Akun\UsersController;
use Illuminate\Support\Facades\Route;

Route::post("/users/non_aktifkan/", [UsersController::class, "non_aktifkan"]);
Route::put("/users/simpan", [UsersController::class, "update"]);
Route::resource("/users", UsersController::class);
