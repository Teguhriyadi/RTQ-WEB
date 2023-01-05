<?php

use App\Http\Controllers\AdminCabang\Akun\AsatidzController;
use Illuminate\Support\Facades\Route;

Route::resource("/asatidz", AsatidzController::class,  [
    'asatidz' => 'prefix'
]);
