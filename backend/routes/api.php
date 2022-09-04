<?php

use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WeatherSearchController;
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

Route::get('/get-weather', [WeatherController::class, 'getWeather']);
Route::get('/weather-searches', [WeatherSearchController::class, 'index']);
