<?php

use App\Http\Controllers\forcastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/myLocation/{id}', forcastController::class, 'index');

Route::get('favourites/{id}', forcastController::class, 'getFavourites');
Route::get('addFavourite/{id}/{location_id}', forcastController::class, 'setFavourites');

