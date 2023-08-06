<?php

use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\RowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth.basic')->group(function () {
    Route::post('/rows', ExcelUploadController::class);
});

Route::get('/rows', RowController::class);
