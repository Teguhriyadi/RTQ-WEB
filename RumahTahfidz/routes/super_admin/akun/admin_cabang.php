<?php

use App\Http\Controllers\SuperAdmin\Akun\AdminLokasiRtController;
use Illuminate\Support\Facades\Route;

Route::resource("admin_cabang", AdminLokasiRtController::class, ["as" => "admin_cabang"]);
