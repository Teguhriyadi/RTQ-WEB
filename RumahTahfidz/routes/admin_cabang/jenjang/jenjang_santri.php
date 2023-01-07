<?php

use App\Http\Controllers\AdminCabang\Jenjang\JenjangSantriController;
use Illuminate\Support\Facades\Route;

Route::get("/jenjang_santri", [JenjangSantriController::class, "jenjang_santri"]);
Route::put("/jenjang_santri", [JenjangSantriController::class, "jenjang_santri_dua"]);
Route::post("/jenjang_santri", [JenjangSantriController::class, "post_jenjang_santri"]);
