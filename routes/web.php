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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/obat','ObatController');

Route::resource('/pasien','PasienController');

Route::get('/data_pasien/{id}','BarcodeController@data_pasien')->name('data_pasien');

Route::resource('/dokter','DokterController');
Route::resource('/apoteker','ApotekerController');
Route::resource('/kasir','KasirController');

Route::resource('/registrasi','RegistrasiController')->names('registrasi');
Route::get('/cek_pasien/{id}','RegistrasiController@cek_pasien')->name('cek_pasien');

Route::resource('/diagnosa','DiagnosaController')->names('diagnosa');
Route::get('diagnosa/cek_data/{id}','DiagnosaController@cek_data')->name('diagnosa.cek_data');
Route::resource('/resep','ResepController')->names('resep');

Route::resource('/apotik','ApotikController')->names('apotik');
Route::get('apotik/cek_data/{id}','ApotikController@cek_data')->name('cek_data');

Route::resource('/pembayaran','PembayaranController')->names('pembayaran');
Route::get('pembayaran/cek_data/{id}','PembayaranController@cek_data')->name('pembayaran.cek_data');

Route::resource('/rekam_medis','RekammedisController')->names('rekam_medis');
Route::get('rekam_medis/cek_data_rekam_medis/{id}','RekammedisController@cek_data')->name('cek_data_rekam_medis');
Route::post('/tambah_resep_obat','DiagnosaController@tambah_resep_obat')->name('tambah_resep_obat');

// laporan pengunjung
Route::get('/laporan_pengunjung', 'LaporanController@laporan_pengunjung')->name('laporan_pengunjung');
Route::get('/laporan_pengunjung/filter', 'LaporanController@filter_laporan_pengunjung')->name('laporan_pengunjung.filter');
Route::get('/laporan_pengunjung/cek_data/{id}','LaporanController@cek_data')->name('laporan_pengunjung.cek_data');

// laporan pengeluaran obat
Route::get('/laporan_pengeluaran_obat', 'LaporanController@laporan_pengeluaran_obat')->name('laporan_pengeluaran_obat');
Route::get('/laporan_pengeluaran_obat/filter', 'LaporanController@filter_laporan_pengeluaran_obat')->name('laporan_pengeluaran_obat.filter');
// laporan pendapatan
Route::get('/laporan_pendapatan', 'LaporanController@laporan_pendapatan')->name('laporan_pendapatan');
Route::get('/laporan_pendapatan/filter', 'LaporanController@filter_laporan_pendapatan')->name('laporan_pendapatan.filter');
