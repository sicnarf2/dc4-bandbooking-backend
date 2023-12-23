<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;

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

Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('/band', [BandController::class, 'index'])->name('index');
Route::get('/band/create', [BandController::class, 'create']);
Route::post('/band/create', [BandController::class, 'store']);
Route::get('/band/{artist}', [BandController::class, 'edit']);
Route::post('/band/{artist}', [BandController::class, 'update']);

Route::get('/booking', [BookingController::class, 'index'])->name('index');
Route::get('/booking/create', [BookingController::class, 'create']);
Route::post('/booking/create', [BookingController::class, 'store']);
Route::get('/booking/{user}', [BookingController::class, 'edit']);
Route::post('/booking/{user}', [BookingController::class, 'update']);

Route::get('/user', [UserController::class, 'index'])->name('index');
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store']);
Route::get('/user/{user}', [UserController::class, 'edit']);
Route::post('/user/{user}', [UserController::class, 'update']);

