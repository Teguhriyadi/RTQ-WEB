<?php

use App\Http\Controllers\Public\Master\PelajaranController;
use Illuminate\Support\Facades\Route;

Route::get("/pelajaran/edit", [PelajaranController::class, "edit"]);
Route::put("/pelajaran/simpan", [PelajaranController::class, "update"]);
Route::resource("/pelajaran", PelajaranController::class, [
    'as' => "iuran.pel"
]);
