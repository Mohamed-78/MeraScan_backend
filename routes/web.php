<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRcodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [QRcodeController::class, 'index']);

Route::post("ajout", [QRcodeController::class, 'generate'])->name('nouveau-employe');
