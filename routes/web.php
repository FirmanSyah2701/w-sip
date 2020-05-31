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
Route::resource('doctor', 'DokterController');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard'); 

Route::get('/pasien/ambil_antrian', 'AntrianController@create')->name('ambilAntrian');
Route::post('/pasien/no_antrian', 'AntrianController@store')->name('ambilAntrianPost');
Route::get('/pasien/lihat_no_antri/{name}', 'AntrianController@show');
Route::get('/pasien/konsultasi', 'KonsulController@index')->name('patientConsult');
Route::get('/pasien/jawaban_konsultasi', 'KonsulController@jawaban_konsul');
Route::post('/pasien/konsultasiPost', 'KonsulController@store')->name('addKonsultasi');
Route::get('/login/pasien', 'LoginController@showLoginPasien')->name('loginPasien');
Route::post('/login/checkPasien', 'LoginController@loginPasien')->name('loginPasienPost');
Route::get('/logout/pasien', 'LoginController@logoutPasien')->name('logoutPasien');
Route::get('/profile/pasien', 'PasienController@showProfile')->name('profilePasien');