<?php

use App\Http\Controllers\Public\Akun\SantriController;
use Illuminate\Support\Facades\Route;

Route::get("/santri/edit", [SantriController::class, "edit"]);
Route::get("/santri/datatables", [SantriController::class, "datatables"]);
Route::put("/santri/simpan", [SantriController::class, "update"]);
Route::get("/santri/{id}/sertifikat", [SantriController::class, "sertifikat"]);
Route::get("/santri/{id}/view_sertifikat", [SantriController::class, "view_sertifikat"]);
Route::get("/santri/tambah_data_santri", [SantriController::class, "tambah_data_santri"]);
Route::post("/santri/tambah_santri_by_wali", [SantriController::class, "tambah_santri_by_wali"]);
Route::get("/santri/export", [ExcelController::class, "exportSantri"]);
Route::resource("/santri", SantriController::class,  [
    'santri' => 'prefix'
]);
Route::post("/santri/import", [ExcelController::class, "importSantri"]);
