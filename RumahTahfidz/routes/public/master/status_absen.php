<?php

use App\Http\Controllers\Public\Master\StatusAbsenController;
use Illuminate\Support\Facades\Route;

Route::get("/status_absen/edit", [StatusAbsenController::class, "edit"]);
Route::put("/status_absen/simpan", [StatusAbsenController::class, "update"]);
Route::resource("/status_absen", StatusAbsenController::class);
