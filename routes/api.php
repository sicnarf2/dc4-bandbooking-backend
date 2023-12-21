<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VehicleController;
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


Route::get('/customers/{customer}',[CustomerController::class, 'view']);
Route::patch('/customers/{customer}',[CustomerController::class, 'update']);
Route::put('/customers/{customer}',[CustomerController::class, 'update']);
Route::delete('/customers/{customer}',[CustomerController::class, 'destroy']);
Route::get('/customers',[CustomerController::class, 'index']);
Route::post('/customers',[CustomerController::class, 'store']);

Route::get('/vehicles/{vehicle}',[VehicleController::class, 'view']);
Route::patch('/vehicles/{vehicle}',[VehicleController::class, 'update']);
Route::put('/vehicles/{vehicle}',[VehicleController::class, 'update']);
Route::delete('/vehicles/{vehicle}',[VehicleController::class, 'destroy']);
Route::get('/vehicles',[VehicleController::class, 'vehicle']);
Route::post('/vehicles',[VehicleController::class, 'store']);

Route::get('/orders/{order}',[OrderController::class, 'view']);
Route::patch('/orders/{order}',[OrderController::class, 'update']);
Route::put('/orders/{order}',[OrderController::class, 'update']);
Route::delete('/orders/{order}',[OrderController::class, 'destroy']);
Route::get('/orders',[OrderController::class, 'index']);
Route::post('/orders',[OrderController::class, 'store']);