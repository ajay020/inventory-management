<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ========================= Category =========================
Route::get(
    'categories/trash',
    [CategoryController::class, 'trash']
)->name('categories.trash');

Route::patch(
    'categories/{category}/restore',
    [CategoryController::class, 'restore']
)->name('categories.restore');

Route::delete(
    'categories/{category}/force-delete',
    [CategoryController::class, 'forceDelete']
)
->withTrashed()
->name('categories.force-delete');

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});

// =================== Product =================================
Route::get(
    'products/trash',
    [ProductController::class, 'trash']
)->name('products.trash');

Route::patch(
    'products/{product}/restore',
    [ProductController::class, 'restore']
)
->withTrashed()
->name('products.restore');

Route::get(
        '/products/low-stock',
        [ ProductController::class, 'lowStock' ]
    )->name('products.low-stock');

Route::resource('products', ProductController::class);




//================== Suppliers ==========================
Route::get(
    'suppliers/trash',
    [SupplierController::class, 'trash']
)->name('suppliers.trash');

Route::patch(
    'suppliers/{supplier}/restore',
    [SupplierController::class, 'restore']
)
->withTrashed()
->name('suppliers.restore');

Route::middleware('auth')->group(function () {
    Route::resource('/suppliers', SupplierController::class);
});



//====================== Dashboard ==================================================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Profile 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









require __DIR__.'/auth.php';
