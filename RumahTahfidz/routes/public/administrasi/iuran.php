<?php

use App\Http\Controllers\Public\Administrasi\IuranController;
use Illuminate\Support\Facades\Route;

Route::get("/iuran", [IuranController::class, "validasi_admin_cabang"]);
Route::put("/iuran", [IuranController::class, "simpan_validasi"]);
