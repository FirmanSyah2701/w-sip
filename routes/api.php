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

Route::get('data/poli', 'API\PoliApiController@getPoli');
Route::post('data/poli', 'API\PoliApiController@store');
Route::put('data/poli/{id}', 'API\PoliApiController@update');
Route::delete('data/poli/{id}', 'API\PoliApiController@destroy');
