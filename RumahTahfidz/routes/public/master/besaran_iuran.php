<?php

use App\Http\Controllers\Public\Master\BesaranIuranController;
use Illuminate\Support\Facades\Route;

Route::get("/besaran_iuran/edit", [BesaranIuranController::class, "edit"]);
Route::put("/besaran_iuran/simpan", [BesaranIuranController::class, "update"]);
Route::resource("/besaran_iuran", BesaranIuranController::class);
