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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function(){
    return view('pasien.register');
});

Route::get('/pasien/konsultasi', 'ConsultationController@index');
ROute::post('/pasien/konsultasi', 'ConsultationController@store')->name('addKonsultasi');
Route::get('/login/pasien', function(){
    return view('pasien.login');
});