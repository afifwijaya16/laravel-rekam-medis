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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/obat','ObatController');
Route::resource('/pasien','PasienController');
Route::resource('/dokter','DokterController');
Route::resource('/rekam_medis','RekammedisController')->names('rekam_medis');
Route::get('/diagnosa','RekammedisController@diagnosa')->name('diagnosa');
