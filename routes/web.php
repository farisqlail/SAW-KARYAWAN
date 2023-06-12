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

Route::get('/', 'FrontendController@index')->name('home.user');

Auth::routes();

Route::get('daftar-lowongan', 'LowonganController@home')->name('lowongan.home');

Route::get('/lowongan/search', 'LowonganController@search')->name('lowongan.search');

Route::get('/lowongan/detail/{id}', 'LowonganController@show')->name('lowongan.detail');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/admin/home', 'HomeController@index')->name('home');


    //LOWONGAN
    Route::prefix('/lowongan')->group(function ()
    {


        Route::get('/admin', 'LowonganController@index')->name('lowongan.index');

        Route::get('/tambah', 'LowonganController@create')->name('lowongan.tambah');

        Route::get('/detail/lowongan/{id}', 'LowonganController@detailAdmin')->name('lowongan.detailAdmin');
        Route::post('/tambah', 'LowonganController@store')->name('lowongan.simpan');
        Route::get('/admin/edit/{id}', 'LowonganController@edit')->name('lowongan.edit');
        Route::post('/admin/edit/{id}', 'LowonganController@update')->name('lowongan.update');
        Route::get('/admin/hapus/{id}', 'LowonganController@delete')->name('lowongan.delete');
        Route::get('/admin/hapus/{id}', 'LowonganController@destroy')->name('lowongan.hapus');
        Route::get('/admin/approve/hrd/{id}', 'LowonganController@approveHrd')->name('lowongan.approveHrd');
        Route::get('/admin/approve/direksi/{id}', 'LowonganController@approveDireksi')->name('lowongan.approveDireksi');
        Route::get('/admin/tolak/direksi/{id}', 'LowonganController@tolakDireksi')->name('lowongan.tolakDireksi');
        Route::get('/admin/tolak/hrd/{id}', 'LowonganController@tolakHrd')->name('lowongan.tolakHrd');
        //Kriteria
        Route::get('/admin/kriteria/{id}', 'KriteriaController@index')->name('kriteria.index');
        Route::get('/admin/kriteria/{id}/tambah', 'KriteriaController@create')->name('kriteria.tambah');
        Route::post('/admin/kriteria/tambah', 'KriteriaController@store')->name('kriteria.simpan');
        Route::get('/admin/kriteria/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
        Route::post('/admin/kriteria/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
        Route::get('/admin/kriteria/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
        //Bobot Kriteria
        Route::get('/admin/bobot_kriteria/{id}', 'BobotKriteriaController@index')->name('bobot_kriteria.index');
        Route::get('/admin/bobot_kriteria/{id}/tambah', 'BobotKriteriaController@create')->name('bobot_kriteria.tambah');
        Route::post('/admin/bobot_kriteria/tambah', 'BobotKriteriaController@store')->name('bobot_kriteria.simpan');
        Route::get('/admin/bobot_kriteria/edit/{id}', 'BobotKriteriaController@edit')->name('bobot_kriteria.edit');
        Route::post('/admin/bobot_kriteria/edit/{id}', 'BobotKriteriaController@update')->name('bobot_kriteria.update');
        Route::get('/admin/bobot_kriteria/hapus/{id}', 'BobotKriteriaController@destroy')->name('bobot_kriteria.hapus');

        Route::get('/{id}/melamar', 'PelamarController@create')->name('lowongam.pelamar.tambah');
        Route::post('/melamar', 'PelamarController@store')->name('lowongan.pelamar.simpan');
    });


    Route::prefix('/daftar_soal')->group(function ()
    {
        Route::get('/admin/{id}', 'DaftarSoalController@index')->name('daftar_soal.index');
        Route::get('/admin/{id}/tambah', 'DaftarSoalController@create')->name('daftar_soal.tambah');
        Route::post('/admin/tambah', 'DaftarSoalController@store')->name('daftar_soal.simpan');
        Route::get('/admin/edit/{id}', 'DaftarSoalController@edit')->name('daftar_soal.edit');
        Route::post('/admin/edit/{id}', 'DaftarSoalController@update')->name('daftar_soal.update');
        Route::get('/admin/hapus/{id}', 'DaftarSoalController@destroy')->name('daftar_soal.hapus');
        Route::get('/soal-tes/{id}', 'DaftarSoalController@home')->name('daftar_soal.home');

    });

    Route::prefix('/jadwal_tes')->group(function ()
    {
        Route::get('/admin', 'JadwalTesController@index')->name('jadwal_tes.index');
        Route::get('/admin/tambah', 'JadwalTesController@create')->name('jadwal_tes.tambah');
        Route::post('/admin/tambah', 'JadwalTesController@store')->name('jadwal_tes.simpan');
        Route::get('/admin/pilih/{id}', 'JadwalTesController@pilihsoal')->name('jadwal_tes.pilihsoal');
        Route::post('/admin/pilih/{id}', 'JadwalTesController@simpansoal')->name('jadwal_tes.simpansoal');
        Route::post('/admin/hapussoal/{id}', 'JadwalTesController@hapussoal')->name('jadwal_tes.hapussoal');
        Route::get('/admin/edit/{id}', 'JadwalTesController@edit')->name('jadwal_tes.ubah');
        Route::post('/admin/edit/{id}', 'JadwalTesController@update')->name('jadwal_tes.update');
        Route::get('/admin/jadwal/hapus/{id}', 'JadwalTesController@destroy')->name('jadwal_tes.hapus');
        Route::get('/admin/notif/{id}', 'JadwalTesController@notif')->name('jadwal_tes.notif');
        Route::get('/admin/jadwal', 'JadwalTesController@home')->name('soal-tes.home');

        //Jawaban
        Route::get('/hasil-tes/{id}', 'HasilTesController@index')->name('jawaban.index');
        Route::get('/jawaban/unggah/{id}', 'HasilTesController@create')->name('jawaban.unggah');
        Route::get('/jawaban/detail/{id}', 'HasilTesController@detail')->name('jawaban.detail');
        Route::get('/jawaban/bobot-kriteria', 'HasilTesController@getBobotKriteria')->name('jawaban.bobot-kriteria');
        Route::post('/jawaban', 'HasilTesController@store')->name('jawaban.store');
        Route::get('/nilai-jawaban/{id}', 'HasilTesController@edit')->name('jawaban.nilai');
        Route::put('/nilai-jawaban/{id}', 'HasilTesController@updateNilai')->name('jawaban.nilai.update');
        Route::get('/jawaban/edit/{id}', 'HasilTesController@editJawaban')->name('jawaban.edit');
        Route::patch('/jawaban/edit/{id}', 'HasilTesController@updateJawaban')->name('jawaban.update');
    });

    Route::prefix('/pelamar')->group(function ()
    {
        Route::get('/wawancara/{id}', 'PelamarController@wawancara')->name('wawancara');
        Route::get('/hasil/wawancara/{id}', 'PelamarController@hasilwawancara')->name('hasil.wawancara');
        Route::post('/hasil/wawancara/{id}', 'PelamarController@storeWawancara')->name('hasil.store');
        Route::post('/seleksi-pelamar/{id}', 'PelamarController@update')->name('pelamar.update');
        Route::get('/admin', 'PelamarController@index')->name('pelamar.index');
        // Route::get('/edit/{id}', 'PelamarController@edit')->name('pelamar.ubah');
        Route::post('/tolak-seleksi-satu', 'PelamarController@tolakSatu')->name('pelamar.tolak.satu');
        Route::post('/tolak-seleksi-dua', 'PelamarController@tolakDua')->name('pelamar.tolak.dua');
        Route::post('/seleksi-pelamar-dua/{id}', 'PelamarController@seleksiDua')->name('pelamar.seleksi.dua');
        Route::get('/hapus/{id}', 'PelamarController@destroy')->name('pelamar.hapus');
        Route::get('/riwayat-lamaran/{id}', 'PelamarController@riwayat')->name('pelamar.riwayat');
        Route::post('/validasi-dokumen/{id}', 'PelamarController@statusDokumen')->name('pelamar.statusDokumen');
    });

    Route::prefix('/perhitungan')->group(function ()
    {
        Route::get('/admin/seleksi-1/{id}', 'PerhitunganController@index')->name('perhitungan.index');
        Route::get('/admin/seleksi-pelamar', 'PerhitunganController@lowongan')->name('perhitungan.pelamar');
        Route::get('/admin/seleksi-detail/{id}', 'PerhitunganController@detail')->name('seleksi.detail');
        Route::get('/admin/seleksi-2/{id}', 'PerhitunganController@perhitungan2')->name('perhitungan.dua');
        Route::get('/admin/validasi/{id}', 'PerhitunganController@validation')->name('perhitungan.validasi');

        Route::get('/pdf/cv/{id}', 'PerhitunganController@pdf')->name('perhitungan.pdf');
        Route::get('/pdf/ijazah/{id}', 'PerhitunganController@pdfIjazah')->name('perhitungan.pdfIjazah');
        Route::get('/pdf/pasFoto/{id}', 'PerhitunganController@pasFoto')->name('perhitungan.pasFoto');
    });

    Route::prefix('/email')->group(function ()
    {
        Route::get('/email/{id}', 'PelamarController@email')->name('email.index');
    });

    route::group(['prefix' => 'admin','namespace' => 'Admin'], function(){
        route::resource('pelamar','PelamarController');
    });


    Route::prefix('/cetak')->group(function ()
    {
        Route::get('/admin/cetak-seleksi-1/{id}', 'PerhitunganController@laporan1')->name('seleksi.satu');
        Route::get('/admin/cetak-seleksi-2/{id}', 'PerhitunganController@laporan2')->name('seleksi.dua');
    });

    Route::resource('/admin/user-akses', 'UserAksesController');
    Route::get('/admin/user-akses/hapus/{id}', 'UserAksesController@destroy')->name('user-akses.hapus');

    Route::resource('/admin/role', 'RoleController');
    Route::get('/admin/role/hapus/{id}', 'RoleController@destroy')->name('role.hapus');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/chart-pelamar', 'HomeController@chartPelamar')->name('chart.pelamar');

});

