<?php

use App\Http\Controllers\Public\Profil\ProfilUserController;
use Illuminate\Support\Facades\Route;

Route::get("/profil/user", [ProfilUserController::class, "index"]);
Route::put("/profil/user/simpan_gambar_profil", [ProfilUserController::class, "simpan_gambar_profil"]);
Route::put("/profil/user/ganti_password", [ProfilUserController::class, "ganti_password"]);
