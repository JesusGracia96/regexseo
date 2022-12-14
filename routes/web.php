<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', [ImagesController::class, 'index'])->name('index');
Route::get('/unaothorized', function(){
    return view('unaothorized');
});

Route::get('/upload', [ImagesController::class, 'upload'])->name('upload');
Route::post('/save', [ImagesController::class, 'save'])->name('save');
Route::get('/moderation', [ImagesController::class, 'moderation'])->name('moderation')->middleware('isAdmin');
Route::post('/allow', [ImagesController::class, 'allow'])->name('allow');
Route::post('/like', [ImagesController::class, 'addFavorite'])->name('like');
Route::get('/favorites', [ImagesController::class, 'favorites'])->name('favorites');

Route::prefix('auth')->group(function () {
    Route::get('/', [CustomAuthController::class, 'index'])->name('auth');
    Route::post('/login', [CustomAuthController::class, 'login'])->name('login');
    Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
    Route::post('/register', [CustomAuthController::class, 'register'])->name('register');
});

