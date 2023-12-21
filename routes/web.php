<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TrackController;

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

Route::get('/artist', [ArtistController::class, 'artist'])->name('artists');
Route::get('/artist/create', [ArtistController::class, 'create']);
Route::post('/artists/create', [ArtistController::class, 'store']);
Route::get('/artists/{artist}', [ArtistController::class, 'edit']);
Route::post('/artists/{artist}', [ArtistController::class, 'update']);

Route::get('/album', [AlbumController::class, 'album'])->name('albums');

Route::get('/track', [TrackController::class, 'track'])->name('albums');

