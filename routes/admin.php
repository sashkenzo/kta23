<?php
use App\Http\Controllers\Change\CarouselController;
use Illuminate\Support\Facades\Route;


// change carousel form //

Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel');
Route::get('/carousel/new', [CarouselController::class, 'create'])->name('carousel.create');
Route::get('/carousel/{id}', [CarouselController::class, 'edit'])->name('carousel.edit');
Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
Route::put('/carousel/{id}', [CarouselController::class, 'update'])->name('carousel.update');
Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.delete');
