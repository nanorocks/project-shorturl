<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::middleware('guest')->group(function () {


    Route::post('/short-url', [HomeController::class, 'store'])->name('store.shorturl');

    Route::get('/{uuid}', [HomeController::class, 'serveUrl'])->name('serve.url');
});

Route::middleware('auth')->group(function () {

    Route::get('/optimize', [HomeController::class, 'optimize'])->name('serve.url.optimize');

    Route::get('/cache-clear', [HomeController::class, 'cacheClear'])->name('serve.url.cache.clear');
});
