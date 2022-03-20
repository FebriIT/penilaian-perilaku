<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatyaLancanaController;
use App\Http\Controllers\OpdController;

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



Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/satyalancana', [SatyaLancanaController::class, 'index']);
    Route::get('/inputsatyalancana', [SatyaLancanaController::class, 'input']);
    Route::post('/inputsatyalancana/post',[SatyaLancanaController::class,'post']);
    Route::get('/satyalancana/{id}/hapus',[SatyaLancanaController::class,'hapus']);


    Route::resource('opd', OpdController::class)->except(['show','update']);
    // Route::

});
