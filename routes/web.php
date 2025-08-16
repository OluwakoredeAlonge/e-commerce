<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('welcome');
});

Route::view('/welcome', 'welcome')->name('welcome');
// Route::get('/overview', function () {
//     return view('admin.overview');
// })->middleware(middleware: ['auth', 'verified'])->name('overview');
// Admin overview route for superadmin
Route::get('/admin-overview', function () {
    return view('admin.overview');
})->middleware(['auth', 'verified'])->name('overview');

// Attendant overview route
Route::get('/attendant-overview', function () {
    return view('attendant.overview');
})->middleware(['auth', 'verified'])->name('attendant.overview');
Route::middleware(['auth', 'verified'])
    ->prefix('products')
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/add', 'create')->name('products.create');
        Route::post('/', 'store')->name('products.store');
        Route::get('/', 'index')->name('products.index');
        Route::get('/{product}/edit', 'edit')->name('products.edit');
        Route::get('/{product}', 'show')->name('products.show');
        Route::put('/{product}', 'update')->name('products.update');
        Route::delete('/{product}', 'destroy')->name('products.destroy');
    });

Route::get('/add-attendant', function () {
    return view('admin.add-attendant');
})->middleware(['auth', 'verified'])->name('add-attendant');
Route::middleware(['auth', 'verified'])
    ->prefix('categories')
    ->controller(CategoryController::class)
    ->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::post('/add', 'store')->name('categories.store');
        Route::get('/{category}/edit',  'edit')->name('categories.edit');
        Route::delete('/{category}',  'destroy')->name('categories.destroy');
        Route::put('/{category}',  'update')->name('categories.update');
    });
Route::get('/set-password', [AuthController::class, 'showSetPasswordForm'])->name('password.set');
Route::post('/set-password', [AuthController::class, 'setPassword'])->name('password.update');

Route::view('/daily-sales', 'admin.daily-sales')->middleware(['auth', 'verified'])->name('daily-sales');
Route::get('/low-stock', [ProductController::class, 'lowStock'])
    ->name('products.lowStock');
Route::get('/orders', function () {
    return view('admin.orders');
})->middleware(['auth', 'verified'])->name('orders');
Route::get('/register-business', function () {
    return view('admin.register-business');
})->middleware(['auth', 'verified'])->name('register-business');
Route::get('/sales-history', function () {
    return view('admin.sales-history');
})->middleware(['auth', 'verified'])->name('sales-history');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
