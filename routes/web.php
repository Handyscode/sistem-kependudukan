<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InputController;
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
Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
  Route::get('/input', [PagesController::class, 'create'])->name('input');
  Route::get('/dashboard/edit/{id}', [PagesController::class, 'edit'])->name('dashboard.edit');
  Route::post('/dashboard/edit/{id}', [InputController::class, 'update'])->name('dashboard.edit.update');
  Route::post('/input', [InputController::class, 'store'])->name('input.store');
  Route::post('/logout', [UserController::class, 'logout'])->name('logout-user');
  
  // Khusus Admin //
  Route::get('/data-warga', [PagesController::class, 'dataWarga'])->name('datawarga.index')->middleware('user-access:admin');
  Route::get('/laporan', [PagesController::class, 'laporan'])->name('laporan.index')->middleware('user-access:admin');
  Route::post('/laporan', [PagesController::class, 'laporan'])->name('laporan.index.post')->middleware('user-access:admin');
  Route::get('/data-user', [PagesController::class, 'dataUser'])->name('datauser.index')->middleware('user-access:admin');
  Route::get('/laporan/export-pdf', [InputController::class, 'exportPDF'])->name('laporan.exportpdf')->middleware('user-access:admin');
  Route::get('/laporan/export-xlsx', [InputController::class, 'exportXLSX'])->name('laporan.exportxlsx')->middleware('user-access:admin');
  Route::post('/laporan/get-filter', [InputController::class, 'getFilter'])->name('laporan.getfilter')->middleware('user-access:admin');
  Route::post('/laporan/delete/{id}', [InputController::class, 'deleteWarga'])->name('laporan.deletewarga')->middleware('user-access:admin');
  Route::post('/data-user/delete/{id}', [InputController::class, 'destroy'])->name('datauser.delete')->middleware('user-access:admin');
  Route::post('/data-warga/verify/{id}', [InputController::class, 'verify'])->name('datawarga.verify')->middleware('user-access:admin');
  Route::post('/data-warga/decline/{id}', [InputController::class, 'decline'])->name('datawarga.decline')->middleware('user-access:admin');

});

Route::middleware(['guest'])->group(function () {
  Route::get('/', [PagesController::class, 'index'])->name('login');
  Route::get('/registrasi', [PagesController::class, 'registrasi'])->name('registrasi');
  
  
  Route::post('/', [UserController::class, 'auth'])->name('auth');
  Route::post('/registrasi', [UserController::class, 'register'])->name('register');
});