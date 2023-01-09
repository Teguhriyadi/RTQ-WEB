<?php

use App\Http\Controllers\Public\Setting\Pengaturan\StatusValidasiController;
use Illuminate\Support\Facades\Route;

Route::prefix("/validasi")->group(function () {
    Route::get("/edit", [StatusValidasiController::class, "edit"]);
    Route::put("/simpan", [StatusValidasiController::class, "update"]);
    Route::delete("/{id}", [StatusValidasiController::class, "destroy"]);
    Route::resource("/", StatusValidasiController::class, [
        'as' => "validasi.setting"
    ]);
});
