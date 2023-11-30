<?php

use App\Http\Controllers\AdminBerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruBerandaController;
use App\Http\Controllers\LoginController;
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

//admin
Route::middleware(['auth', Admin::class])->prefix('admin')->name('admin.')->group(function (){
    Route::get('beranda', [AdminBerandaController::class, 'index'])->name('beranda');
    Route::resource('user', UserController::class);
});

//guru
Route::middleware(['auth', Guru::class])->prefix('guru')->name('guru.')->group(function (){
    Route::get('beranda', [GuruBerandaController::class, 'index'])->name('beranda');
});

