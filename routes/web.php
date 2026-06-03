<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK (Siapa saja boleh akses)
|--------------------------------------------------------------------------
*/
Route::get('/', [EventController::class, 'home']);
Route::get('/event/{event}', [EventController::class, 'show'])->whereNumber('event');

/*
|--------------------------------------------------------------------------
| RUTE TAMU (hanya untuk pengunjung yang BELUM login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| RUTE PANEL ADMIN (wajib login sebagai Admin — dijaga middleware 'admin')
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('admin')->group(function () {

    Route::get('/dashboard', [CategoryController::class, 'index']);

    // CRUD Kategori
    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/store', [CategoryController::class, 'store']);
    Route::get('/kategori/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/kategori/{category}', [CategoryController::class, 'update']);
    Route::delete('/kategori/{category}', [CategoryController::class, 'destroy']);

    // CRUD Acara
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event/store', [EventController::class, 'store']);
    Route::get('/event/{event}/edit', [EventController::class, 'edit']);
    Route::put('/event/{event}', [EventController::class, 'update']);
    Route::delete('/event/{event}', [EventController::class, 'destroy']);
});
