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

Route::get('/', 'HomeController@index');

Route::get('/friend/{friend}', 'FriendController@show');

Route::get('/match/create', 'MatchController@create');
Route::get('/match/{match}', 'MatchController@show');
Route::post('/match', 'MatchController@store');
