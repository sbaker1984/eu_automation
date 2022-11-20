<?php

use App\Http\Controllers\favouriteController;
use App\Http\Controllers\forcastController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('api/topLocations', [forcastController::class, 'showAll']);
Route::get('api/forecast/{location_id}', [forcastController::class, 'fiveDayForecast']);
Route::get('favourite/add/{id}/{location_id}', [favouriteController::class, 'add']);
Route::get('favourite/delete/{id}/{location_id}', [favouriteController::class, 'delete']);

Route::get('/dashboard', [forcastController::class, 'index']);
