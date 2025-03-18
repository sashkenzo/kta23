<?php
use App\Http\Controllers\Change\CarouselController;
use Illuminate\Support\Facades\Route;


// change carousel form //

Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel');
Route::get('/carousel/new', [CarouselController::class, 'create'])->name('carousel.create');
Route::post('/carousel/store', [CarouselController::class, 'store'])->name('carousel.store');
