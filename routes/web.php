<?php

use App\Http\Controllers\ApiAbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MulaiMenilaiController;
use App\Http\Controllers\SatyaLancanaController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


// Route::get('/',function(){
//     return view('awal');
// });
// Route::get('/api',[ApiAbsensiController::class,'index']);
Route::get('/',[AwalController::class,'index']);
Route::get('/pilihopd',[MulaiMenilaiController::class,'index']);
Route::get('/pilihpegawai/{ids}',[MulaiMenilaiController::class,'open']);
Route::get('/mulaimenilai/{nip}',[MulaiMenilaiController::class,'mulaimenilai']);
Route::get('/getNip',[MulaiMenilaiController::class,'getNip']);
Route::post('/mulaimenilai/post',[MulaiMenilaiController::class,'postnilai']);


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
// Route::get('/register',[AuthController::class,'register'])->name('register');
// Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');



Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/pengaturan',[PengaturanController::class,'index']);
    Route::post('/pengaturan/post',[PengaturanController::class,'update']);


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/datauser', [UserController::class, 'index']);

    // Route::resource('/satyalancana',SatyaLancanaController::class);
    Route::resource('opd', OpdController::class)->except(['show','update']);
    Route::get('/penilaian', [PenilaianController::class,'index']);
    Route::get('/penilaian/update', [PenilaianController::class,'updatestatus'])->name('updatestatus');
    Route::get('/penilaian/{id}',[PenilaianController::class,'indexx']);
    Route::get('/penilaian/{id}/laporan',[PenilaianController::class,'laporan']);
    Route::get('/penilaian/{id}/hapus', [PenilaianController::class,'hapus']);
    Route::get('/penilaian/{id}/detail', [PenilaianController::class,'datapenilai']);
    Route::get('/penilaian/pertanyaan/{nippenilai}/{nipygdinilai}', [PenilaianController::class,'datapertanyaan']);

    // Route::get('/penilaian/{id}/open', [PeriodeController::class,'openn']);
    Route::post('/periode', [PeriodeController::class,'store'])->name('post.periode');
    Route::delete('/periode/{id}', [PeriodeController::class,'destroy']);
    Route::get('/periode/{id}/edit', [PeriodeController::class,'edit']);

    Route::get('/pertanyaan', [PertanyaanController::class,'index']);
    Route::post('/pertanyaan', [PertanyaanController::class,'store'])->name('post.pertanyaan');
    Route::delete('/pertanyaan/{id}', [PertanyaanController::class,'destroy']);
    Route::get('/pertanyaan/{id}/edit', [PertanyaanController::class,'edit']);

    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'changepassword']);
    

    // Route::


});
Route::prefix('user')->middleware('auth', 'role:user')->group(function () {

    Route::get('/penilaian', [PenilaianController::class,'index'])->name('dashboard.user');
    Route::get('/penilaian/{id}/laporan',[PenilaianController::class,'laporan']);

    // Route::get('/satyalancana',[SatyaLancanaController::class,'index'])->name('satyalancana.index');



    // Route::resource('satyalancana',SatyaLancanaController::class);



});
