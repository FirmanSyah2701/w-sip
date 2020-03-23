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
//admin
Route::resource('doctor', 'DoctorController');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard'); 

Route::get('/pasien/konsultasi', 'ConsultationController@index')->name('patientConsult');
Route::post('/pasien/konsultasi', 'ConsultationController@store')->name('addKonsultasi');
Route::get('/login/pasien', function(){
    return view('pasien.login');
});