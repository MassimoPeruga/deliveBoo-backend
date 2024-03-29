<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::resource('/restaurant',RestaurantController::class);
//     Route::resource('/dish',DishController::class);
// });

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::resource('restaurants', RestaurantController::class)->parameters(['restaurants' => 'restaurant:slug'])->except(['index', 'create', 'store']);
        Route::resource('dishes', DishController::class)->parameters(['dishes' => 'dish:slug'])->except(['index', 'show']);
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });


require __DIR__ . '/auth.php';
