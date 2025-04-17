<?php

use App\Http\Controllers\Super\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/new', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
Route::put('/blog/{id}/changestatus', [BlogController::class, 'changeStatusBtn'])->name('blog.changestatus');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/new', [BlogController::class, 'create'])->name('blog.create');
Route::get('/blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
Route::put('/blog/{id}/changestatus', [BlogController::class, 'changeStatusBtn'])->name('blog.changestatus');
