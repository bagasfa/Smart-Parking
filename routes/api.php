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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

	// API Mobile Petugas
	Route::get('/petugas', 'PetugasController@indexAPI');

	// API Mobile Mahasiswa
	Route::get('/mahasiswa', 'MahasiswaController@indexAPI');
	Route::post('/mahasiswa/create', 'MahasiswaController@createAPI');

	// API Mobile Laporan / Petugas
	Route::post('/laporan/create', 'LaporanController@createAPI');
	Route::post('/laporan/{id_laporan}/keluar', 'LaporanController@updateAPI');
