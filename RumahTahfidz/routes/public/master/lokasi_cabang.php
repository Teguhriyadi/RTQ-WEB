<?php

use App\Http\Controllers\Public\Master\LokasiCabangController;
use Illuminate\Support\Facades\Route;

Route::get("/lokasi_cabang/edit", [LokasiCabangController::class, "edit"]);
Route::put("/lokasi_cabang/simpan", [LokasiCabangController::class, "update"]);
Route::resource("/lokasi_cabang", LokasiCabangController::class);
