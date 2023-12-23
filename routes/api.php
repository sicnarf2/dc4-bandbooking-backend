<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/bands/{band}',[BandController::class, 'view']);
Route::patch('/bands/{band}',[BandController::class, 'update']);
Route::put('/bands/{band}',[BandController::class, 'update']);
Route::delete('/bands/{band}',[BandController::class, 'destroy']);
Route::get('/bands',[BandController::class, 'index']);
Route::post('/bands',[BandController::class, 'store']);



Route::get('/bookings/{booking}',[BookingController::class, 'view']);
Route::patch('/bookings/{booking}',[BookingController::class, 'update']);
Route::put('/bookings/{booking}',[BookingController::class, 'update']);
Route::delete('/bookings/{booking}',[BookingController::class, 'destroy']);
Route::get('/bookings',[BookingController::class, 'booking']);
Route::post('/bookings',[BookingController::class, 'store']);


Route::get('/users/{user}',[UserController::class, 'view']);
Route::patch('/users/{user}',[UserController::class, 'update']);
Route::put('/users/{user}',[UserController::class, 'update']);
Route::delete('/users/{user}',[UserController::class, 'destroy']);
Route::get('/users',[UserController::class, 'user']);
Route::post('/users',[UserController::class, 'store']);

