<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanGtkController;
use App\Http\Controllers\DataDosenController;
use App\Http\Controllers\DataGumongController;
use App\Http\Controllers\TautanBahanController;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| REDIRECT SETELAH LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
// ADMIN
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.admin');
})->middleware(['auth', 'isAdmin'])->name('admin.dashboard');

// USER
Route::get('/user/dashboard', function () {
    return view('user.dashboard.user');
})->middleware('auth')->name('user.dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN CRUD (FULL AKSES)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('laporan-gtk', LaporanGtkController::class);
        Route::resource('data-dosen', DataDosenController::class);
        Route::resource('data-gumong', DataGumongController::class);
        Route::resource('tautan', TautanBahanController::class);
    });

/*
|--------------------------------------------------------------------------
| USER (VIEW SAJA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('laporan-gtk', [LaporanGtkController::class, 'index'])
            ->name('laporan-gtk.index');

        Route::get('data-dosen', [DataDosenController::class, 'index'])
            ->name('data-dosen.index');

        Route::get('data-gumong', [DataGumongController::class, 'index'])
            ->name('data-gumong.index');

        Route::get('tautan', [TautanBahanController::class, 'index'])
            ->name('tautan.index');
    });
