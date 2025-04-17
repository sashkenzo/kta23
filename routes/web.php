<?php

use App\Http\Controllers\Change\SubNavBarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Super\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/updateEmail', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::post('profile/updateProfile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/new', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/new', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/{slug}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{slug}/edit', [ProductController::class, 'update'])->name('product.update');
Route::put('/product/{slug}/changestatus', [ProductController::class, 'changeStatusBtn'])->name('product.changestatus');
Route::delete('/product/{slug}/edit', [ProductController::class, 'destroy'])->name('product.delete');


Route::get('/cat/{slug}', [SubNavBarController::class, 'show'])->name('subnavs.show');
