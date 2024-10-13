<?php

use App\Http\Controllers\GuruController;
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/guru', [App\Http\Controllers\HomeController::class, 'guru']);
    Route::get('/gurus', [App\Http\Controllers\HomeController::class, 'gurus']);
    Route::get('/siswas', [App\Http\Controllers\HomeController::class, 'siswas']);
    Route::get('/kelas', [App\Http\Controllers\HomeController::class, 'kelas']);
    Route::get('/mapels', [App\Http\Controllers\HomeController::class, 'mapels']);
    Route::get('/mapelKelas', [App\Http\Controllers\HomeController::class, 'mapelKelas']);
    Route::post('/simpanGmk', [App\Http\Controllers\HomeController::class, 'simpanGmk']);
    Route::get('/delGmk/{id}', [App\Http\Controllers\HomeController::class, 'delGmk']);
    Route::get('/delMapelKelas/{id}', [App\Http\Controllers\HomeController::class, 'delMapelKelas']);
    Route::get('/delMapel/{id}', [App\Http\Controllers\HomeController::class, 'delMapel']);
    Route::post('simpanMapelKelas', [App\Http\Controllers\HomeController::class, 'simpanMapelKelas']);
    Route::get('/walis', [App\Http\Controllers\HomeController::class, 'wali']);
    Route::post('simpanWali', [App\Http\Controllers\HomeController::class, 'simpanWali']);
    Route::get('delWali/{id}', [App\Http\Controllers\HomeController::class, 'delWali']);
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
});


Route::group(['middleware' => ['auth', 'guru', 'wali']], function () {
    Route::get('/wali', [WaliController::class, 'index']);
    Route::get('cetak/{id}', [WaliController::class, 'cetak']);
});


