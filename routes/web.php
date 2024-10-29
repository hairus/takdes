<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruTatibController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WaliController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);


// Auth::routes();
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('tas', [\App\Http\Controllers\HomeController::class, 'tas']);
    Route::get('ta/aktif/{id}', [\App\Http\Controllers\HomeController::class, 'aktif']);
    Route::post('simpanTa', [\App\Http\Controllers\HomeController::class, 'simpanTa']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/guru', [App\Http\Controllers\HomeController::class, 'guru']);
    Route::get('/gurus', [App\Http\Controllers\HomeController::class, 'gurus']);
    Route::get('/siswas', [App\Http\Controllers\HomeController::class, 'siswas']);
    Route::get('/kelas', [App\Http\Controllers\HomeController::class, 'kelas']);
    Route::get('/mapels', [App\Http\Controllers\HomeController::class, 'mapels']);
    Route::get('/mapelKelas', [App\Http\Controllers\HomeController::class, 'mapelKelas']);
    Route::post('/copyMapel', [App\Http\Controllers\HomeController::class, 'copyMapel']);
    Route::post('/simpanGmk', [App\Http\Controllers\HomeController::class, 'simpanGmk']);
    Route::get('/delGmk/{id}', [App\Http\Controllers\HomeController::class, 'delGmk']);
    Route::get('/delMapelKelas/{id}', [App\Http\Controllers\HomeController::class, 'delMapelKelas']);
    Route::get('/delMapel/{id}', [App\Http\Controllers\HomeController::class, 'delMapel']);
    Route::post('simpanMapelKelas', [App\Http\Controllers\HomeController::class, 'simpanMapelKelas']);
    Route::get('/walis', [App\Http\Controllers\HomeController::class, 'wali']);
    Route::post('simpanWali', [App\Http\Controllers\HomeController::class, 'simpanWali']);
    Route::get('delWali/{id}', [App\Http\Controllers\HomeController::class, 'delWali']);

    Route::get('ekstra', [App\Http\Controllers\HomeController::class, 'ekstra']);
    Route::post('simpanEkstra', [App\Http\Controllers\HomeController::class, 'simpanEkstra']);
    Route::post('simpanGuruEkstra', [App\Http\Controllers\HomeController::class, 'simpanGuruEkstra']);
    Route::get('delEkstra/{id}', [App\Http\Controllers\HomeController::class, 'delEkstra']);
    Route::get('delGuruEkstra/{id}', [App\Http\Controllers\HomeController::class, 'delGuruEkstra']);


    Route::get('tatibs', [App\Http\Controllers\HomeController::class, 'tatibs']);
    Route::post('simpanGuruTatib', [App\Http\Controllers\HomeController::class, 'simpanGuruTatib']);
    Route::get('deleteGuruTatib/{id}', [App\Http\Controllers\HomeController::class, 'deleteGuruTatib']);
    Route::post('simGuruKelasTatib', [App\Http\Controllers\HomeController::class, 'simGuruKelasTatib']);
    Route::get('delgkt/{id}', [App\Http\Controllers\HomeController::class, 'delgkt']);

    Route::get('monitor', [\App\Http\Controllers\HomeController::class, 'monitor']);
    Route::get('/admin/showSiswas/{id}', [\App\Http\Controllers\HomeController::class, 'showSiswas']);
    Route::get('/admin/showNilai/{id}', [\App\Http\Controllers\HomeController::class, 'cetak']);
    Route::get('/admin/download/{id}', [\App\Http\Controllers\HomeController::class, 'downloadPdf']);
    Route::get('/admin/coba', [\App\Http\Controllers\HomeController::class, 'coba']);


});

Route::group(['middleware' => ['auth', 'guru']], function () {
    Route::get('/cetak', [App\Http\Controllers\HomeController::class, 'cetak']);
    Route::get('/profile', [GuruController::class, 'index']);
    Route::get('/penT', [GuruController::class, 'penT']);
    Route::post('/exportT', [GuruController::class, 'exportT']);
    Route::post('/imporT', [GuruController::class, 'importT']);
    Route::get('/penUH', [GuruController::class, 'penUH']);
    Route::post('/exportUH', [GuruController::class, 'exportUH']);
    Route::post('/imporUH', [GuruController::class, 'importUH']);
    Route::get('/kehadiran', [GuruController::class, 'kehadiran']);
    Route::post('/exportKehadiran', [GuruController::class, 'exportKehadiran']);
    Route::post('/importKehadiran', [GuruController::class, 'importKehadiran']);


    Route::get('mappingSiswaEkstra', [GuruController::class, 'mappingSiswaEkstra']);
    Route::post('simpanMapingSiswa', [GuruController::class, 'simpanMapingSiswa']);
    Route::get('delSiswaEkstra/{id}', [GuruController::class, 'delSiswaEkstra']);
    Route::get('delNilaiEkstra/{id}', [GuruController::class, 'delNilaiEkstra']);
    Route::get('InputNilaiEkstra', [GuruController::class, 'InputNilaiEkstra']);
    Route::get('downloadEkstra', [GuruController::class, 'downloadEkstra']);
    Route::post('importNilaiEkstra', [GuruController::class, 'importNilaiEkstra']);
});


Route::group(['middleware' => ['auth', 'guru', 'wali']], function () {
    Route::get('/wali', [WaliController::class, 'index']);
    Route::get('cetak/{id}', [WaliController::class, 'cetak']);
});


Route::group(['middleware' => ['auth', 'guru' ,'tatib']], function () {
    Route::get('/inputPoin', [GuruTatibController::class, 'inputPoin']);
    Route::post('/exportPoin', [GuruTatibController::class, 'exportPoin']);
    Route::post('/importPoin', [GuruTatibController::class, 'importPoin']);
    Route::get('delPoin/{id}', [GuruTatibController::class, 'delPoin']);
});



