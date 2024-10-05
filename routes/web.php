<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController; // Import CategoryController

// Root route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

Route::get('/home', [CategoryController::class, 'index'])->name('category.index');
Route::resource('category', CategoryController::class);
// // Category routes with specified methods
// Route::match(['get', 'post'], '/category', [CategoryController::class, 'index'])->name('category.index');
// Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
// Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
