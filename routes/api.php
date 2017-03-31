<?php

use Illuminate\Http\Request;

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



Route::middleware('api')->post('/poll', 'PollController@store');
Route::middleware('api')->get('/poll/{id}', 'PollController@show');
Route::middleware('api')->delete('/poll/{id}', 'PollController@destroy');
Route::middleware('api')->patch('/poll/{id}', 'PollController@update');
Route::middleware('api')->get('/data/{id}', 'PollController@getData');
