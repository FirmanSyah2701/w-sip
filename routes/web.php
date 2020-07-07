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

//admin
//Route::resource('doctor', 'DokterController');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('dashboard'); 

Route::get('/pasien/ambil_antrian', 'AntrianController@createByPatient')->name('ambilAntrian');
Route::post('/pesan/antrian', 'AntrianController@store')->name('antrianPost');
Route::get('/pasien/lihat_no_antri', 'AntrianController@showByPatient')->name('liatAntrian');

Route::get('/pasien/konsultasi', 'KonsulController@index')->name('patientConsult');
Route::get('/pasien/jawaban_konsultasi', 'KonsulController@jawaban_konsul')->name('patientListConsult');
Route::post('/pasien/konsultasiPost', 'KonsulController@store')->name('addKonsultasi');

Route::get('/login/pasien', 'LoginController@showLoginPasien')->name('loginPasien');
Route::post('/login/pasien', 'LoginController@loginPasien')->name('loginPasienPost');
Route::get('/logout/pasien', 'LoginController@logoutPasien')->name('logoutPasien');
Route::get('/daftar/akunPasien', 'LoginController@showRegisterPasien')->name('showRegisterPasien');
Route::post('/daftar/pasien', 'LoginController@registerPasien')->name('registerPasienPost');

Route::get('/profile/pasien', 'PasienController@showProfile')->name('profilePasien');
Route::put('/profile/ubahAkunPasien/{id}', 'PasienController@editProfile')->name('editProfile');

Route::get('/pasien/rekam_medis', 'RekamMedisController@showMedisById')->name('showRekamMedisById');

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

Route::get('dokter', 'HalamanDepanController@index');
/* Route::get('doctor', function () {
    return view('layouts.doctor');
});

Route::get('blog', function () {
    return view('layouts.blog');
}); */

//------------------Admin------------------
Route::get('admin/dataDokter', function () {
    return view('admin/dataDokter');
});

Route::get('admin/TambahDataDokter', function () {
    return view('admin/TambahDataDokter');
});

Route::get('admin/dataPasien', function () {
    return view('admin/dataPasien');
});

Route::get('admin/dataAntrian', function () {
    return view('admin/dataAntrian');
});
Route::get('login', function () {
    $level = ['Administrator', 'Dokter', 'Petugas Obat'];
    return view('login', compact('level'));
});

//--------------CRUD Data Dokter----------------------

Route::get('admin/dataDokter','DokterController@index');
Route::get('admin/dataDokter','DokterController@tampil_data');
Route::get('admin/TambahDataDokter','DokterController@tambah');
Route::post('AksiTambahDataDokter','DokterController@store');
Route::get('admin/UbahDataDokter/{id}','DokterController@ubah');
Route::put('AksiUbahDataDokter/{id}','DokterController@update');
Route::get('HapusDataDokter/{id}','DokterController@delete');

//--------------CRUD Data Pasien----------------------

Route::get('admin/dataPasien','DataPasienController@index');
Route::get('admin/dataPasien','DataPasienController@tampil_data');
Route::get('admin/TambahDataPasien','DataPasienController@tambah');
Route::post('AksiTambahDataPasien','DataPasienController@store');
Route::get('admin/UbahDataPasien{id_pasien}','DataPasienController@ubah');
Route::put('AksiUbahDataPasien{id_pasien}','DataPasienController@update');
Route::get('HapusDataPasien{id_pasien}','DataPasienController@delete');

//--------------CRUD Antrian----------------------

Route::get('admin/dataAntrian','AntrianController@index');
//Route::get('admin/dataAntrian','AntrianController@tampil_data');
Route::get('admin/TambahDataAntrian','AntrianController@tambah');
//Route::post('AksiTambahDataAntrian','AntrianController@store');
Route::get('admin/UbahDataAntrian{id_antrian}','AntrianController@ubah');
Route::put('AksiUbahDataAntrian{id_antrian}','AntrianController@update');
Route::get('HapusDataAntrian{id_antrian}','AntrianController@delete');
Route::get('admin/detailDataAntrian{id_antrian}','AntrianController@detailAntrian');

//--------------CRUD Poli----------------------

Route::get('admin/poli','PoliController@index');
Route::get('admin/poli','PoliController@tampil_data');
Route::get('admin/TambahPoli','PoliController@tambah');
Route::post('AksiTambahPoli','PoliController@store');
Route::get('admin/UbahPoli{id_poli}','PoliController@ubah');
Route::put('AksiUbahPoli{id_poli}','PoliController@update');
Route::get('HapusPoli{id_poli}','PoliController@delete');

//--------------CRUD Rekam Medis----------------------

Route::get('admin/rekamMedis','RekamMedisController@index');
Route::get('admin/rekamMedis','RekamMedisController@tampil_data');
Route::get('admin/TambahRekamMedis','RekamMedisController@tambah');
Route::post('AksiTambahRekamMedis','RekamMedisController@store');
Route::get('admin/UbahRekamMedis{id_rekam_medis}','RekamMedisController@ubah');
Route::put('AksiUbahRekamMedis{id_rekam_medis}','RekamMedisController@update');
Route::get('HapusRekamMedis{id_rekam_medis}','RekamMedisController@delete');

//-----------------CRUD Blog-------------------------------------------

Route::get('admin/blog_admin','BlogController@index');
Route::get('admin/blog_admin','BlogController@tampil_data');
Route::get('admin/TambahBlog','BlogController@tambah');
Route::post('AksiTambahBlog','BlogController@store');
Route::get('admin/UbahBlog{id_blog}','BlogController@ubah');
Route::put('AksiUbahBlog{id_blog}','BlogController@update');
Route::get('HapusBlog{id_blog}','BlogController@delete');
Route::get('blog','BlogController@semuaBlog');
Route::get('detail_blog/{slug}','BlogController@detailBlog');


//--------------login dan register admin---------------
Route::get('admin/loginAdmin', function () {
    return view('admin/loginAdmin');
});

Route::get('admin/registerAdmin', function () {
    return view('admin/registerAdmin');
});
Route::get('/admin/DashboardAdmin', 'AdminController@index');
Route::get('/index', 'AdminController@loginAdmin');
Route::post('/loginAdminPost', 'AdminController@loginAdminPost');
Route::get('/registerAdmin', 'AdminController@registerAdmin');
Route::post('/registerAdminPost', 'AdminController@registerAdminPost');
Route::get('/logoutAdmin', 'AdminController@logoutAdmin');

Route::get('admin/index', function () {
    return view('admin/index');
});



Route::get('admin/dataAdmin', function () {
    return view('admin/dataAdmin');
});

//--------------CRUD Data Admin-------------------

Route::get('admin/dataAdmin','DataAdminController@index');
Route::get('admin/dataAdmin','DataAdminController@tampil_data');
Route::get('admin/TambahDataAdmin','DataAdminController@tambah');
Route::post('AksiTambahDataAdmin','DataAdminController@store');
Route::get('admin/UbahDataAdmin/{id}','DataAdminController@ubah');
Route::put('AksiUbahDataAdmin/{id}','DataAdminController@update');
Route::get('HapusDataAdmin/{id}','DataAdminController@delete');

//--------------CRUD Data Pasien-------------------

/* Route::get('admin/dataPasien','DataPasienController@index');
Route::get('admin/dataPasien','DataPasienController@tampil_data');
Route::get('admin/TambahDataPasien','DataPasienController@tambah');
Route::post('AksiTambahDataPasien','DataPasienController@store');
Route::get('UbahDataPasien{id_pasien}','DataPasienController@ubah');
Route::put('AksiUbahDataPasien{id_pasien}','DataPasienController@update');
Route::get('HapusDataPasien{id_pasien}','DataPasienController@delete'); */

//================Halaman Dokter============================
Route::get('dokter/loginDokter', function () {
    return view('dokter/loginDokter');
});
Route::get('dokter/dataKonsultasi', function () {
    return view('dokter/dataKonsultasi');
});
/* 
Route::get('/dokter/DashboardDokter', 'DokterController@index'); */
Route::get('dokter/DashboardDokter','DokterController@data');
Route::get('/index', 'DokterController@loginDokter');
Route::post('/loginDokterPost', 'DokterController@loginDokterPost');
Route::get('/registerDokter', 'DokterController@registerDokter');
Route::post('/registerDokterPost', 'DokterController@registerDokterPost');
Route::get('/logoutDokter', 'DokterController@logoutDokter');

Route::get('dokter/dataMedisPasien','RekamMedisController@dataMedispasien');
Route::get('dokter/LihatRekamMedis{id_rekam_medis}','RekamMedisController@lihatRekamMedis');

//----------------------Konsultasi Dokter----------------
//Route::get('dokter/dataKonsultasi','KonsultasiController@index');
Route::get('dokter/dataKonsultasi','KonsulController@tampil_data');
Route::get('dokter/TambahDataKonsultasi','KonsulController@tambah');
Route::post('AksiTambahDataKonsultasi','KonsulController@store');
Route::get('dokter/BalasDokter{id_Konsultasi}','KonsulController@ubah');
Route::post('AksiBalasJawaban{id_Konsultasi}','KonsultController@update');
Route::get('HapusDataKonsultasi{id_Konsultasi}','KonsulController@delete');

Route::get('/home_user', 'User@index');
Route::get('/login', 'User@login');
Route::post('/loginPost', 'User@loginPost');
Route::get('/register', 'User@register');
Route::post('/registerPost', 'User@registerPost');
Route::get('/logout', 'User@logout');

//Route::get('dokter', 'DokterController@index')->name('dokter');
Route::get('dokter/tambah', 'DokterController@create');
Route::get('dokter/edit/{id}',
'DokterController@edit');
Route::post('dokter/tambah/proses',
'DokterController@store');
Route::put('dokter/edit/proses/{id}',
'DokterController@update');
Route::delete('dokter/hapus/{id}',
'DokterController@destroy');