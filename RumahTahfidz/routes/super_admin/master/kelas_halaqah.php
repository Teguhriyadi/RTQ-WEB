<?php

use App\Http\Controllers\SuperAdmin\Master\KelasHalaqahController;
use Illuminate\Support\Facades\Route;

Route::get("/kelas_halaqah/edit", [KelasHalaqahController::class, "edit"]);
Route::put("/kelas_halaqah/simpan", [KelasHalaqahController::class, "update"]);
Route::resource("/kelas_halaqah", KelasHalaqahController::class);
