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


Route::get('/login/pasien', 'PasienController@showLoginPasien')->name('loginPasien');
Route::post('/login/pasien', 'PasienController@loginPasien')->name('loginPasienPost');
Route::get('/logout/pasien', 'PasienController@logoutPasien')->name('logoutPasien');
Route::get('/profile/pasien', 'PasienController@showProfile')->name('profilePasien');
Route::post('/daftar/pasien', 'PasienController@registerPasien')->name('registerPasienPost');
Route::put('/profile/ubahAkunPasien/{id}', 'PasienController@editProfile')->name('editProfile');
Route::get('/daftar/akunPasien', 'PasienController@showRegisterPasien')->name('showRegisterPasien');
Route::get('admin/dataPasien','PasienController@dataPasien');

Route::get('dokter', 'HalamanDepanController@index');
Route::get('/pesanAntrian', 'HalamanDepanController@showPesanAntrian')->name('pesanAntrian');

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('login', function () {
    return view('layouts.login');
});

Route::get('about', function () {
    return view('layouts.about');
});


//--------------CRUD Dokter----------------------
Route::get('admin/dataDokter','DokterController@dataDokter');
Route::get('admin/TambahDataDokter','DokterController@tambah');
Route::post('AksiTambahDataDokter','DokterController@store');
Route::get('admin/UbahDataDokter/{id}','DokterController@ubah');
Route::put('AksiUbahDataDokter/{id}','DokterController@update');
Route::get('HapusDataDokter/{id}','DokterController@delete');

Route::get('dokter/loginDokter', 'DokterController@loginDokter');
Route::get('dokter/DashboardDokter','DokterController@dashboardDokter');
Route::get('/index', 'DokterController@loginDokter');
Route::post('/loginDokterPost', 'DokterController@loginDokterPost');
Route::get('/registerDokter', 'DokterController@registerDokter');
Route::post('/registerDokterPost', 'DokterController@registerDokterPost');
Route::get('/logoutDokter', 'DokterController@logoutDokter');
Route::get('dokter/tambah', 'DokterController@create');
Route::get('dokter/edit/{id}', 'DokterController@edit');
Route::post('dokter/tambah/proses', 'DokterController@store');
Route::put('dokter/edit/proses/{id}', 'DokterController@update');
Route::delete('dokter/hapus/{id}', 'DokterController@destroy');

//--------------CRUD Antrian---------------------------------------------------------
Route::get('admin/dataAntrian','AntrianController@index');
Route::get('admin/TambahDataAntrian','AntrianController@tambah');
Route::get('admin/UbahDataAntrian{id_antrian}','AntrianController@ubah');
Route::put('AksiUbahDataAntrian{id_antrian}','AntrianController@update');
Route::get('HapusDataAntrian{id_antrian}','AntrianController@delete');
Route::get('admin/detailDataAntrian{id_antrian}','AntrianController@detailAntrian');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard'); 
Route::get('/pasien/ambil_antrian', 'AntrianController@createByPatient')->name('ambilAntrian');
Route::post('/pesan/antrian', 'AntrianController@store')->name('antrianPost');
Route::get('/pasien/lihat_no_antri', 'AntrianController@showByPatient')->name('liatAntrian');

//--------------CRUD Poli--------------------------------------
Route::get('admin/poli','PoliController@dataPoli');
Route::get('admin/TambahPoli','PoliController@tambah');
Route::post('AksiTambahPoli','PoliController@store');
Route::get('admin/UbahPoli{id_poli}','PoliController@ubah');
Route::put('AksiUbahPoli{id_poli}','PoliController@update');
Route::get('HapusPoli{id_poli}','PoliController@delete');

//--------------CRUD Rekam Medis-----------------------------------------------
Route::get('admin/rekamMedis','RekamMedisController@dataMedis');
Route::get('admin/TambahRekamMedis','RekamMedisController@tambah');
Route::post('AksiTambahRekamMedis','RekamMedisController@store');
Route::get('admin/UbahRekamMedis{id_rekam_medis}','RekamMedisController@ubah');
Route::put('AksiUbahRekamMedis{id_rekam_medis}','RekamMedisController@update');
Route::get('HapusRekamMedis{id_rekam_medis}','RekamMedisController@delete');
Route::get('dokter/dataMedisPasien','RekamMedisController@dataMedisbyDokter');
Route::get('dokter/LihatRekamMedis{id_rekam_medis}','RekamMedisController@lihatRekamMedis');
Route::get('/pasien/rekam_medis', 'RekamMedisController@showMedisByPatient')->name('showRekamMedisById');

//-----------------CRUD Blog-------------------------------------------
Route::get('admin/blog_admin','BlogController@dataBlog');
Route::get('admin/TambahBlog','BlogController@tambah');
Route::post('AksiTambahBlog','BlogController@store');
Route::get('admin/UbahBlog{id_blog}','BlogController@ubah');
Route::put('AksiUbahBlog{id_blog}','BlogController@update');
Route::get('HapusBlog{id_blog}','BlogController@delete');
Route::get('blog','BlogController@blogPage');
Route::get('detail_blog/{slug}','BlogController@detailBlog');


//--------------login dan register admin--------------------------------
Route::get('admin/loginAdmin', 'AdminController@loginAdmin');
Route::get('/admin/DashboardAdmin', 'AdminController@dashboardAdmin');
Route::post('/loginAdminPost', 'AdminController@loginAdminPost');
Route::get('/registerAdmin', 'AdminController@registerAdmin');
Route::post('/registerAdminPost', 'AdminController@registerAdminPost');
Route::get('/logoutAdmin', 'AdminController@logoutAdmin');

//----------------------Konsultasi ---------------
Route::get('dokter/dataKonsultasi','KonsulController@dataKonsul');
Route::get('dokter/TambahDataKonsultasi','KonsulController@tambah');
Route::post('AksiTambahDataKonsultasi','KonsulController@store');
Route::get('dokter/BalasDokter{id_Konsultasi}','KonsulController@ubah');
Route::put('AksiBalasJawaban{id_Konsultasi}','KonsulController@update');
Route::get('HapusDataKonsultasi{id_Konsultasi}','KonsulController@delete');
Route::get('/pasien/konsultasi', 'KonsulController@index')->name('patientConsult');
Route::post('/pasien/konsultasiPost', 'KonsulController@store')->name('addKonsultasi');
Route::get('/pasien/jawaban_konsultasi', 'KonsulController@konsulPasien')->name('patientListConsult');;
