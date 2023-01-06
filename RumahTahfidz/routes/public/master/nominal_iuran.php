<?php

use App\Http\Controllers\Public\Master\NominalIuranController;
use Illuminate\Support\Facades\Route;

Route::prefix("/nominal/iuran")->group(function () {
    Route::get("/edit", [NominalIuranController::class, "edit"]);
    Route::put("/simpan", [NominalIuranController::class, "update"]);
    Route::post("/aktifkan", [NominalIuranController::class, "aktifkan"]);
    Route::post("/non_aktifkan", [NominalIuranController::class, "non_aktifkan"]);
    Route::delete("/{id}", [NominalIuranController::class, "destroy"]);
    Route::resource("/", NominalIuranController::class);
});
