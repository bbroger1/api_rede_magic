<?php

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

use Illuminate\Support\Facades\Route;

Route::apiResource('movie', 'App\Http\Controllers\Api\MovieController');

Route::get('movie/details/{details}', 'App\Http\Controllers\Api\MovieController@showDetails')->where(['classification' => '[0-9]+']);
