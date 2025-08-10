<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/overview', function () {
    return view('admin.overview');
})->middleware(middleware: ['auth', 'verified'])->name('overview');
Route::get('/add-product', function () {
    return view('admin.add-product');
})->middleware(['auth', 'verified'])->name('add-product');
Route::get('/products', function () {
    return view('admin.products');
})->middleware(['auth', 'verified'])->name('products');
Route::get('/add-attendant', function () {
    return view('admin.add-attendant');
})->middleware(['auth', 'verified'])->name('add-attendant');
Route::get('/add-category', function () {
    return view('admin.add-category');
})->middleware(['auth', 'verified'])->name('add-category');
Route::get('/daily-sales', function () {
    return view('admin.daily-sales');
})->middleware(['auth', 'verified'])->name('daily-sales');
Route::get('/low-stock-products', function () {
    return view('admin.low-stock-products');
})->middleware(['auth', 'verified'])->name('low-stock-products');
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

require __DIR__.'/auth.php';
