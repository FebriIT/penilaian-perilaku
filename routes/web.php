<?php

use App\Http\Controllers\ApiAbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatyaLancanaController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PeriodeController;
use App\Models\SatyaLancana;

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



Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/test',[ApiAbsensiController::class,'index']);

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/satyalancana/download/{id}', [SatyaLancanaController::class,'getDownload']);
    Route::get('/satyalancana', [SatyaLancanaController::class,'index'])->name('satya.admin');
    Route::post('/satyalancana', [SatyaLancanaController::class,'store']);
    Route::delete('/satyalancana/{id}', [SatyaLancanaController::class,'destroy']);


    // Route::resource('/satyalancana',SatyaLancanaController::class);
    Route::resource('opd', OpdController::class)->except(['show','update']);
    Route::get('/periode', [PeriodeController::class,'index']);
    Route::post('/periode', [PeriodeController::class,'store']);
    Route::delete('/periode/{id}', [PeriodeController::class,'destroy']);
    Route::get('/periode/{id}/edit', [PeriodeController::class,'edit']);

    // Route::


});
Route::prefix('user')->middleware('auth', 'role:user')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.user');

    // Route::get('/satyalancana',[SatyaLancanaController::class,'index'])->name('satyalancana.index');

    Route::get('/satyalancana', [SatyaLancanaController::class,'index'])->name('satya.user');
    Route::post('/satyalancana', [SatyaLancanaController::class,'store']);
    Route::delete('/satyalancana/{id}', [SatyaLancanaController::class,'destroy']);


    // Route::resource('satyalancana',SatyaLancanaController::class);



});
