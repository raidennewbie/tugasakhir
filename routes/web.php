<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminBerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GuruBerandaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunajarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Guru;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//lupa sandi
Route::get('/reset-password', [LoginController::class, 'lupasandi'])->name('lupasandi');
Route::post('/new-password', [LoginController::class, 'atursandi'])->name('atursandi');
Route::get('/password', [LoginController::class, 'barusandi'])->name('barusandi');
Route::post('/create-password', [LoginController::class, 'buatsandi'])->name('buatsandi');

//admin
Route::middleware(['auth', Admin::class])->prefix('admin')->name('admin.')->group(function (){
    Route::get('beranda', [AdminBerandaController::class, 'index'])->name('beranda');
    Route::resource('user', UserController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('tahunajar', TahunajarController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::get('detail/siswa/{id}/{jadwal_id}', [DetailController::class, 'index'])->name('detail.siswa');
    Route::get('laporan/absensi', [LaporanController::class, 'index'])->name('laporan.absensi');
    Route::get('laporan/harian', [LaporanController::class, 'harian'])->name('laporan.harian');
    Route::get('laporan/nilai', [NilaiController::class, 'nilaisiswa'])->name('laporan.nilai');

//
    Route::get('laporan', [LaporanController::class, 'laporan'])->name('laporan');
//
    Route::get('uhuyy', [LaporanController::class, 'uhuyy'])->name('uhuyy');
});

//guru
Route::middleware(['auth', Guru::class])->prefix('guru')->name('guru.')->group(function (){
    Route::get('beranda', [GuruBerandaController::class, 'index'])->name('beranda');
    Route::resource('jadwal', JadwalController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('detail/siswa/{id}/{jadwal_id}', [DetailController::class, 'gurud'])->name('detail.siswad');
    Route::get('laporan/absensi', [LaporanController::class, 'index'])->name('laporan.absensi');
    Route::get('laporan/harian', [LaporanController::class, 'harianguru'])->name('laporan.harianguru');
    Route::resource('nilai', NilaiController::class);
    Route::get('nilaii', [NilaiController::class, 'nilaii'])->name('nilaii');
    //
    Route::get('laporan', [LaporanController::class, 'laporanguru'])->name('laporanguru');
});

