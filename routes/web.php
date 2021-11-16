<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//LOWONGAN
Route::prefix('/lowongan')->group(function ()
{
    Route::get('/', 'LowonganController@index')->name('lowongan.index');
    Route::get('/daftar-lowongan', 'LowonganController@home')->name('lowongan.home');
    Route::get('/tambah', 'LowonganController@create')->name('lowongan.tambah');
    Route::post('/tambah', 'LowonganController@store')->name('lowongan.simpan');
    Route::get('/edit/{id}', 'LowonganController@edit')->name('lowongan.edit');
    Route::post('/edit/{id}', 'LowonganController@update')->name('lowongan.update');
    Route::post('/hapus/{id}', 'LowonganController@destroy')->name('lowongan.hapus');
});

Route::prefix('/kriteria')->group(function ()
{
    Route::get('/{id}', 'KriteriaController@index')->name('kriteria.index');
    Route::get('/{id}/tambah', 'KriteriaController@create')->name('kriteria.tambah');
    Route::post('/tambah', 'KriteriaController@store')->name('kriteria.simpan');
    Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
    Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::post('/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
});

Route::prefix('/bobot_kriteria')->group(function ()
{
    Route::get('/{id}', 'BobotKriteriaController@index')->name('bobot_kriteria.index');
    Route::get('/{id}/tambah', 'BobotKriteriaController@create')->name('bobot_kriteria.tambah');
    Route::post('/tambah', 'BobotKriteriaController@store')->name('bobot_kriteria.simpan');
    Route::get('/edit/{id}', 'BobotKriteriaController@edit')->name('bobot_kriteria.edit');
    Route::post('/edit/{id}', 'BobotKriteriaController@update')->name('bobot_kriteria.update');
    Route::post('/hapus/{id}', 'BobotKriteriaController@destroy')->name('bobot_kriteria.hapus');
});

Route::prefix('/daftar_soal')->group(function ()
{
    Route::get('/', 'DaftarSoalController@index')->name('daftar_soal.index');
    Route::get('/tambah', 'DaftarSoalController@create')->name('daftar_soal.tambah');
    Route::post('/tambah', 'DaftarSoalController@store')->name('daftar_soal.simpan');
    Route::get('/edit/{id}', 'DaftarSoalController@edit')->name('daftar_soal.edit');
    Route::post('/edit/{id}', 'DaftarSoalController@update')->name('daftar_soal.update');
    Route::post('/hapus/{id}', 'DaftarSoalController@destroy')->name('daftar_soal.hapus');
});

Route::prefix('/jadwal_tes')->group(function ()
{
    Route::get('/', 'JadwalTesController@index')->name('jadwal_tes.index');
   
    Route::get('/tambah', 'JadwalTesController@create')->name('jadwal_tes.tambah');
    Route::post('/tambah', 'JadwalTesController@store')->name('jadwal_tes.simpan');
    Route::get('/pilih/{id}', 'JadwalTesController@pilihsoal')->name('jadwal_tes.pilihsoal');
    Route::post('/pilih/{id}', 'JadwalTesController@simpansoal')->name('jadwal_tes.simpansoal');
    Route::post('/hapussoal/{id}', 'JadwalTesController@hapussoal')->name('jadwal_tes.hapussoal');
    Route::get('/edit/{id}', 'JadwalTesController@edit')->name('jadwal_tes.ubah');
    Route::post('/edit/{id}', 'JadwalTesController@update')->name('jadwal_tes.update');
    Route::post('/hapus/{id}', 'JadwalTesController@destroy')->name('jadwal_tes.hapus');
});

Route::prefix('/pelamar')->group(function ()
{
    Route::get('/', 'PelamarController@index')->name('pelamar.index');
    Route::get('/{id}/melamar', 'PelamarController@create')->name('pelamar.tambah');
    Route::post('/melamar', 'PelamarController@store')->name('pelamar.simpan');
    Route::post('/hapus/{id}', 'PelamarController@destroy')->name('pelamar.hapus');
});