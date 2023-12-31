<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\HomeController;
//admin control
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CountryController;
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

Route::get('/', [indexController::class, 'home'])->name('homepage');
Route::get('/danhmuc/{slug}', [indexController::class, 'category'])-> name('category');
Route::get('/the-loai/{slug}', [indexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [indexController::class, 'country'])-> name('country');
Route::get('/phim', [indexController::class, 'movie'])-> name('movie');
Route::get('/xem-phim', [indexController::class, 'watch'])-> name('watch');
Route::get('/episode', [indexController::class, 'episode'])-> name('episode');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// route admin
Route::resource('category', CategoryController::class);
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
