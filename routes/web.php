<?php

use App\Http\Controllers\ECController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumidityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/humidity', [HumidityController::class, 'index']) -> name ('humidity');
Route::get('/electrical_conductivity', [ECController
::class, 'index']) -> name ('electrical_conductivity');
Route::get('/third_page', [HomeController::class, 'third_page']);

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])-> name('mahasiswa');