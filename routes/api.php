<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
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


Route::get('/artists/{artist}',[ArtistController::class, 'view']);
Route::patch('/artists/{artist}',[ArtistController::class, 'update']);
Route::put('/artists/{artist}',[ArtistController::class, 'update']);
Route::delete('/artists/{artist}',[ArtistController::class, 'destroy']);
Route::get('/artists',[ArtistController::class, 'index']);
Route::post('/artists',[ArtistController::class, 'store']);

Route::get('/albums/{album}',[AlbumController::class, 'view']);
Route::patch('/albums/{album}',[AlbumController::class, 'update']);
Route::put('/albums/{album}',[AlbumController::class, 'update']);
Route::delete('/albums/{album}',[AlbumController::class, 'destroy']);
Route::get('/albums',[AlbumController::class, 'index']);
Route::post('/albums',[AlbumController::class, 'store']);

Route::get('/tracks/{track}',[TrackController::class, 'view']);
Route::patch('/tracks/{track}',[TrackController::class, 'update']);
Route::put('/tracks/{track}',[TrackController::class, 'update']);
Route::delete('/tracks/{track}',[TrackController::class, 'destroy']);
Route::get('/tracks',[TrackController::class, 'track']);
Route::post('/tracks',[TrackController::class, 'store']);