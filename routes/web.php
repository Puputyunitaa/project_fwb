<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductSupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Auth
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Hanya bisa diakses jika login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');


    // CRUD Resource routes
    Route::resource('profiles', ProfileController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('suppliers', SupplierController::class);

    // ProductSupplier (manual karena relasi many-to-many)
    Route::get('product-suppliers', [ProductSupplierController::class, 'index'])->name('product_suppliers.index');
    Route::get('product-suppliers/create', [ProductSupplierController::class, 'create'])->name('product_suppliers.create');
    Route::post('product-suppliers', [ProductSupplierController::class, 'store'])->name('product_suppliers.store');
    Route::delete('product-suppliers/{productSupplier}', [ProductSupplierController::class, 'destroy'])->name('product_suppliers.destroy');
});
