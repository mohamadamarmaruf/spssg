<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBalitaController;
use App\Http\Controllers\DataUkurController;
use App\Http\Controllers\DataEdukasiController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\HalamanKosongController;
use App\Http\Controllers\TutorialController;

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


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/data-balita', [DataBalitaController::class, 'index']);
    Route::get('/data-balita/add', [DataBalitaController::class, 'add']);
    Route::post('/data-balita/add-process', [DataBalitaController::class, 'addProcess']);
    Route::get('/data-balita/detail/{id}', [DataBalitaController::class, 'detail']);
    Route::get('/data-balita/edit/{id}', [DataBalitaController::class, 'edit']);
    Route::post('/data-balita/edit-process', [DataBalitaController::class, 'editProcess']);
    Route::get('/data-balita/delete/{id}', [DataBalitaController::class, 'delete']);
    Route::get('/data-balita/pengukuran/{id}', [DataBalitaController::class, 'pengukuran']);

    Route::get('/data-balita/pengukuran/add/{id}', [DataUkurController::class, 'add']);
    Route::post('/data-balita/pengukuran/add-process', [DataUkurController::class, 'addProcess']);
    Route::get('/data-balita/pengukuran/detail/{id}', [DataUkurController::class, 'detail']);
    Route::get('/data-balita/pengukuran/edit/{id}', [DataUkurController::class, 'edit']);
    Route::post('/data-balita/pengukuran/edit-process', [DataUkurController::class, 'editProcess']);
    Route::get('/data-balita/pengukuran/delete/{id}', [DataUkurController::class, 'delete']);

    Route::get('/data-edukasi', [DataEdukasiController::class, 'index']);
    Route::get('/data-edukasi/add', [DataEdukasiController::class, 'add']);
    Route::post('/data-edukasi/add-process', [DataEdukasiController::class, 'addProcess']);
    Route::get('/data-edukasi/edit/{id}', [DataEdukasiController::class, 'edit']);
    Route::post('/data-edukasi/edit-process', [DataEdukasiController::class, 'editProcess']);
    Route::get('/data-edukasi/delete/{id}', [DataEdukasiController::class, 'delete']);

    Route::get('/data-user', [DataUserController::class, 'index']);
    Route::get('/data-user/add', [DataUserController::class, 'add']);
    Route::post('/data-user/add-process', [DataUserController::class, 'addProcess']);
    Route::get('/data-user/detail/{id}', [DataUserController::class, 'detail']);
    Route::get('/data-user/edit/{id}', [DataUserController::class, 'edit']);
    Route::post('/data-user/edit-process', [DataUserController::class, 'editProcess']);
    Route::get('/data-user/password/{id}', [DataUserController::class, 'password']);
    Route::post('/data-user/password-process', [DataUserController::class, 'passwordProcess']);
    Route::get('/data-user/delete/{id}', [DataUserController::class, 'delete']);

    Route::get('/tutorial-baduta', [TutorialController::class, 'indexBaduta']);
    Route::get('/tutorial-balita', [TutorialController::class, 'indexBalita']);
});
