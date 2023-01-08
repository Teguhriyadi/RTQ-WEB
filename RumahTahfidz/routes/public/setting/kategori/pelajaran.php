<?php

use App\Http\Controllers\Public\Setting\Kategori\PelajaranKategoriController;
use Illuminate\Support\Facades\Route;

Route::get("/pelajaran/edit", [KategoriPelajaranController::class, "edit"]);
Route::put("/pelajaran/simpan", [KategoriPelajaranController::class, "update"]);
Route::resource("/pelajaran", PelajaranKategoriController::class);
