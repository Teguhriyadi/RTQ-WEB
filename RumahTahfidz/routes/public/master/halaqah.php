<?php

use App\Http\Controllers\Public\Master\HalaqahController;
use Illuminate\Support\Facades\Route;

Route::get("/halaqah/edit", [HalaqahController::class, "edit"]);
Route::put("/halaqah/simpan", [HalaqahController::class, "update"]);
Route::delete("/halaqah/{kode_halaqah}", [HalaqahController::class, "destroy"]);
Route::resource("/halaqah", HalaqahController::class);
