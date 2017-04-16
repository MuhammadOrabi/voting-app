<?php

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

Route::get('/', 'HomeController@show');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/poll/{id}', 'PollController@index');

Route::resource('options', 'OptionCotroller');

Route::get('/active/{id}/{code}', 'UserController@active');
Route::get('/active/{id}', 'UserController@resend');
