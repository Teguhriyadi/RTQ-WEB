<?php

use App\Http\Controllers\Public\Master\JabatanController;
use Illuminate\Support\Facades\Route;

Route::get("/jabatan/edit", [JabatanController::class, "edit"]);
Route::put("/jabatan/simpan", [JabatanController::class, "update"]);
Route::resource("jabatan", JabatanController::class);
