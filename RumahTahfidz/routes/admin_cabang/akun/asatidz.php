<?php

use App\Http\Controllers\AdminCabang\Akun\AsatidzController;
use Illuminate\Support\Facades\Route;

Route::get("/asatidz/edit/{id}", [AsatidzController::class, "edit"]);
Route::put("/asatidz/simpan", [AsatidzController::class, "update"]);
Route::resource("/asatidz", AsatidzController::class,  [
    'asatidz' => 'prefix'
]);
