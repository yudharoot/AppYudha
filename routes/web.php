<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\PhotoController;
use App\Http\Controllers\AlbumController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
    Route::post('/albums/{album}/photos', [PhotoController::class, 'store'])->name('photos.store');
    Route::get('/albums/{album}',[AlbumController::class, 'show'])->name('albums.show');
    Route::delete('/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');
    Route::delete('/albums/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
});
