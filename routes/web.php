<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeniulistsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RestaurantsController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::resource('restaurants', RestaurantsController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('meniu', MeniulistsController::class);
    Route::resource('orders', OrdersController::class);
    Route::get('/', [HomeController::class, 'index'])->name('restaurants');
    Route::get('/menius/{id}', [HomeController::class, 'menius'])->name('menius');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
