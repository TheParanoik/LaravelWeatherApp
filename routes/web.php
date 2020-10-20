<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pogodaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [pogodaController::class, 'index']);

Route::get('/w', function () {
    return view('welcome');
});

Route::get('/info', function () {
    return phpinfo();
});

Route::post('/', [pogodaController::class, 'pogoda'])->middleware(['pogoda.input', 'pogoda.log']);
