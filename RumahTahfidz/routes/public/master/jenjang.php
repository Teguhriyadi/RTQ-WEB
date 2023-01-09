<?php

use App\Http\Controllers\Public\Master\JenjangController;
use Illuminate\Support\Facades\Route;

Route::get("/jenjang/edit", [JenjangController::class, "edit"]);
Route::put("jenjang/simpan", [JenjangController::class, "update"]);
Route::resource("/jenjang", JenjangController::class);
