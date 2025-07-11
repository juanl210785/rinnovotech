<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/options', [OptionController::class, 'index'])->name('options.index');

Route::resource('families', FamilyController::class);
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('covers', CoverController::class);

Route::get('/covers/status/{cover}', [CoverController::class, 'changeStatus'])->name('covers.status');
Route::get('/products/status/{product}', [ProductController::class, 'changeStatus'])->name('products.status');
Route::get('/products/{product}/variants/{variant}', [ProductController::class, 'variants'])
    ->scopeBindings()
    ->name('products.variants');
Route::put('/products/{product}/variants/{variant}', [ProductController::class, 'variantsUpdate'])
    ->scopeBindings()
    ->name('products.variantsUpdate');
