<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Super\BlogController;
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
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/edit/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::put('/product/changestatus/{slug}', [ProductController::class, 'changeStatusBtn'])->name('product.changestatus');
//Route::get('/search', [HomepageController::class, 'search'])->name('homepage.show');
Route::get('/cat/{slug}', [HomepageController::class, 'show'])->name('homepage.show');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/new', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
Route::put('/blog/{id}/changestatus', [BlogController::class, 'changeStatusBtn'])->name('blog.changestatus');

