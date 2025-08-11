<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/overview', function () {
    return view('admin.overview');
})->middleware(middleware: ['auth', 'verified'])->name('overview');
Route::get('/add-product', [ProductController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('product.create');
Route::post('/products', [ProductController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('products.store');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
});
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

require __DIR__ . '/auth.php';
