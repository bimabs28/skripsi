<?php

use App\Http\Controllers\ECController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HumidityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LuxController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartController2;
use App\Http\Controllers\PHController;

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
Route::get('/chart/humidity', [HumidityController::class, 'index']) -> name ('humidity');
Route::get('/chart/electrical_conductivity', [ECController::class, 'index']) -> name ('electrical_conductivity');
Route::get('/chart/ph', [PHController::class, 'index']) -> name ('ph');
Route::get('/chart', [ChartController::class, 'index']) -> name ('chart');
Route::get('/readdata', [ChartController::class, 'readdata']) -> name ('readdata');
Route::get('/readdata2', [ChartController::class, 'readdata2']) -> name ('readdata2');
Route::get('/readdata3', [ChartController::class, 'readdata3']) -> name ('readdata3');
Route::get('/chart/luminosity', [LuxController::class, 'index'])-> name('lux');
Route::get('/chart2', [ChartController2::class, 'index']) -> name ('chart2');