<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;

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


Route::resource('/books', BooksController::class);

Route::put('/profile/photo/{profile}', [App\Http\Controllers\ProfileController::class, 'photo']);
Route::resource('/profile', ProfileController::class);

Auth::routes();

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
