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
Route::get('/chart/radar_chart', [HumidityController::class, 'index']) -> name ('radar_chart');
Route::get('/chart/pie_chart', [ECController::class, 'index']) -> name ('pie_chart');
Route::get('/chart/bar_chart', [PHController::class, 'index']) -> name ('bar_chart');
Route::get('/chart', [ChartController::class, 'index']) -> name ('chart');
Route::get('/readdata', [ChartController::class, 'readdata']) -> name ('readdata');
Route::get('/readdata2', [ChartController::class, 'readdata2']) -> name ('readdata2');
Route::get('/readdata3', [ChartController::class, 'readdata3']) -> name ('readdata3');
Route::get('/readdata4', [ChartController::class, 'readdata4']) -> name ('readdata4');
Route::get('/chart/line_chart', [LuxController::class, 'index'])-> name('line_chart');
Route::get('/chart2', [ChartController2::class, 'index']) -> name ('chart2');