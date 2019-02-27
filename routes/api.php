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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/filter/{id}', function($id) {

  $losers = \App\Friend::find($id)->wins->pluck('loser_id')->toArray();

  $friends = \App\Friend::select(['id', 'name'])->get()->filter(function ($friend) use ($id, $losers) {
    return !in_array($friend->id, $losers) && $friend->id != $id;
  });

  return $friends;
});
