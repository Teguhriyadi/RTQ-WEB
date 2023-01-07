<?php

use App\Http\Controllers\AdminCabang\Tes\TesSantriController;
use Illuminate\Support\Facades\Route;

Route::get("/tes/data", [TesSantriController::class, "index"]);
Route::put("/tes/data/{id}", [TesSantriController::class, "detail"]);
Route::get("/tes/input", [TesSantriController::class, "create"]);
Route::put("/tes/simpan", [TesSantriController::class, "update"]);
Route::get("/tes/edit", [TesSantriController::class, "edit"]);
Route::put("/tes/simpan_data", [TesSantriController::class, "simpan"]);
