<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSOController;
use App\Http\Controllers\HomeController;

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


Route::get('/optimize', [HomeController::class, 'optimize'])
    ->name('serve.url.optimize')
    ->middleware('auth');

Route::get('/cache-clear', [HomeController::class, 'cacheClear'])
    ->name('serve.url.cache.clear')
    ->middleware('auth');

Route::view('profile', 'profile')
    ->name('profile')
    ->middleware('auth');

Route::get('/logout', [SSOController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/redirect', [SSOController::class, 'redirect'])->name('sso.redirect');

Route::post('/short-url', [HomeController::class, 'store'])->name('store.shorturl');

Route::get('/auth/callback', [SSOController::class, 'callback'])->name('sso.token');

Route::get('/{uuid}', [HomeController::class, 'serveUrl'])->name('serve.url');

require __DIR__ . '/auth.php';
