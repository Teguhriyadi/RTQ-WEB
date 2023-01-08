<?php

use App\Http\Controllers\Public\Setting\Kategori\PenilaianKategoriController;
use Illuminate\Support\Facades\Route;

Route::get("/nilai/edit", [PenilaianKategoriController::class, "edit"]);
Route::put("/nilai/simpan", [PenilaianKategoriController::class, "update"]);
Route::resource("nilai", PenilaianKategoriController::class);
