<?php

use App\Http\Controllers\SongsController;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\AlbumsController;


use Illuminate\Support\Facades\Route;

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

Route::get('/home', [SongsController::class, 'index']);


Route::resource('songs', SongsController::class);
Route::resource('bands', BandsController::class);
Route::resource('albums', AlbumsController::class);
Route::post('albums/{album}/songs/{song}/attach', [AlbumsController::class, 'AttachSong'])->name('albums.attach');
Route::post('albums/{album}/songs/{song}/detach', [AlbumsController::class, 'DetachSong'])->name('albums.detach');
Route::post('songs/{song}/albums/{album}/attach', [SongsController::class, 'AttachAlbum'])->name('songs.attach');
Route::post('songs/{song}/albums/{album}/detach', [SongsController::class, 'DetachAlbum'])->name('songs.detach');
