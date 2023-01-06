<?php

use App\Http\Controllers\Public\Akun\SantriController;
use App\Http\Controllers\Public\Akun\WaliSantriController;
use Illuminate\Support\Facades\Route;

Route::get("/wali_santri/export", [ExcelController::class, "exportWaliSantri"]);
Route::get("/wali_santri/datatables", [WaliSantriController::class, "datatables"]);
Route::post("/wali_santri/import", [ExcelController::class, "importWaliSantri"]);
Route::get("/wali_santri/create/anak/{id}", [SantriController::class, "create"]);
Route::post("/wali_santri/create/anak/", [SantriController::class, "store"]);
Route::resource("/wali_santri", WaliSantriController::class);
