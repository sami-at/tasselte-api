<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Auth\LoginController;


// Route to show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/admin/products', [ProductAdminController::class, 'index'])->middleware('auth.admin')->name('admin.products.index');
Route::get('/admin/products/create', [ProductAdminController::class, 'create'])->middleware('auth.admin')->name('admin.products.create');
Route::post('/admin/products', [ProductAdminController::class, 'store'])->middleware('auth.admin')->name('admin.products.store');
Route::get('/admin/products/{product}', [ProductAdminController::class, 'show'])->middleware('auth.admin')->name('admin.products.show');
Route::get('/admin/products/{product}/edit', [ProductAdminController::class, 'edit'])->middleware('auth.admin')->name('admin.products.edit');
Route::put('/admin/products/{product}', [ProductAdminController::class, 'update'])->middleware('auth.admin')->name('admin.products.update');
Route::delete('/admin/products/{product}', [ProductAdminController::class, 'destroy'])->middleware('auth.admin')->name('admin.products.destroy');