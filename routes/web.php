<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);



// Auth::routes();
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cetak', [App\Http\Controllers\HomeController::class, 'cetak']);
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





Route::get('/profile', [GuruController::class, 'index']);
Route::get('/penT', [GuruController::class, 'penT']);
Route::get('/penT', [GuruController::class, 'penT']);
Route::post('/exportT', [GuruController::class, 'exportT']);
Route::post('/imporT', [GuruController::class, 'importT']);
