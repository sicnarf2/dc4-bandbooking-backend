<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OrderController;

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

Route::get('/customer', [CustomerController::class, 'index'])->name('index');
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customers/create', [CustomerController::class, 'store']);
Route::get('/customers/{artist}', [CustomerController::class, 'edit']);
Route::post('/customers/{artist}', [CustomerController::class, 'update']);

Route::get('/orders', [OrderController::class, 'index'])->name('index');
Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/orders/create', [OrderController::class, 'store']);
Route::get('/orders/{vehicle}', [OrderController::class, 'edit']);
Route::post('/orders/{vehicle}', [OrderController::class, 'update']);

Route::get('/vehicle', [VehicleController::class, 'index'])->name('index');
Route::get('/vehicle/create', [VehicleController::class, 'create']);
Route::post('/vehicles/create', [VehicleController::class, 'store']);
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'edit']);
Route::post('/vehicles/{vehicle}', [VehicleController::class, 'update']);

