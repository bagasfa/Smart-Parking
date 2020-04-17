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
// Authenticate
Route::get('/', 'AuthController@index')->name('login');
Route::post('/postLogin','AuthController@postLogin');
Route::get('/logout','AuthController@logout');

// Admin Panel
Route::group(['middleware' => ['auth','checkRole:admin']], function(){
	// Dashboard
	Route::get('/dashboard','Controller@dashboard');

	// Admin
	Route::get('/admin', 'AdminController@index');
	Route::post('/admin/create', 'AdminController@create');
	Route::get('/admin/{id}/delete','AdminController@delete');
	Route::get('/admin/{id}/editProfile', 'AdminController@editProfile');
	Route::post('/admin/{id}/updateProfile', 'AdminController@updateProfile');
	Route::get('/admin/{id}/editPass', 'AdminController@editPass');
	Route::post('/admin/{id}/updatePass', 'AdminController@updatePass');

	// Petugas
	Route::get('/petugas', 'PetugasController@index');
	Route::post('/petugas/create', 'PetugasController@create');
	Route::get('/petugas/{id}/delete','PetugasController@delete');
	Route::get('/petugas/{id}/editProfile', 'PetugasController@editProfile');
	Route::post('/petugas/{id}/updateProfile', 'PetugasController@updateProfile');
	Route::get('/petugas/{id}/editPass', 'PetugasController@editPass');
	Route::post('/petugas/{id}/updatePass', 'PetugasController@updatePass');

	// Mahasiswa
	Route::get('/mahasiswa', 'MahasiswaController@index');
	Route::post('/mahasiswa/create', 'MahasiswaController@create');
	Route::get('/mahasiswa/{id}/delete','MahasiswaController@delete');
	Route::get('/mahasiswa/{id}/editProfile', 'MahasiswaController@editProfile');
	Route::post('/mahasiswa/{id}/updateProfile', 'MahasiswaController@updateProfile');
	Route::get('/mahasiswa/{id}/editPass', 'MahasiswaController@editPass');
    Route::post('/mahasiswa/{id}/updatePass', 'MahasiswaController@updatePass');

    // Laporan
    Route::get('/laporan', 'LaporanController@index');
    Route::post('/laporan/create', 'LaporanController@create');
	Route::get('/laporan/{id_laporan}/delete','LaporanController@delete');
    Route::get('/laporan/{id_laporan}/keluar', 'LaporanController@updateKeluar');
    Route::get('/laporan/export', 'LaporanController@export');
});

// Api
Route::get('/admin/api', 'AdminController@api');
Route::get('/petugas/api', 'PetugasController@api');
Route::get('/mahasiswa/api', 'MahasiswaController@api');

?>
