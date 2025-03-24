<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('product.index');

Route::get('/add-product', [ProductController::class, 'create'])->name('product.add');
Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');

Route::get('/update-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/detail-product/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
