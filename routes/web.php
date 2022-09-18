<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes for albums
Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('albums');
Route::get('/album/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('album.create');
Route::post('/album/store', [App\Http\Controllers\AlbumController::class, 'store'])->name('album.store');
Route::get('/album/destroy/{id}', [App\Http\Controllers\AlbumController::class, 'destroy'])->name('album.destroy');
// Route::get('/album/n', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.n');
// Route::get('/album/n', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.n');
// Route::get('/album/n', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.n');
