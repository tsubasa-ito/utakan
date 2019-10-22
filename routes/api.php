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
Route::get('/songs', 'SongController@index');
Route::get('/create', 'SongController@create');
Route::post('/song/create', 'SongController@store');
Route::get('/song/edit/{id}', 'SongsController@edit');
Route::post('/song/update/{id}', 'SongsController@update');
Route::delete('/song/delete/{id}', 'SongController@delete');

Route::get("/data", 'SongController@data');
