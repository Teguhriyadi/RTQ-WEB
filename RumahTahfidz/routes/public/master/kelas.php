<?php

use App\Http\Controllers\Public\Master\KelasController;
use Illuminate\Support\Facades\Route;

Route::get("/kelas/edit", [KelasController::class, "edit"]);
Route::put("/kelas/simpan", [KelasController::class, "update"]);
Route::resource("/kelas", KelasController::class);
