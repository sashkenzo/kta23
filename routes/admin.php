<?php
use App\Http\Controllers\Change\CarouselController;
use App\Http\Controllers\Change\CardsController;
use App\Http\Controllers\Change\FooterController;
use App\Http\Controllers\Change\LoginbarController;
use App\Http\Controllers\Change\BannerController;
use App\Http\Controllers\Change\NavbarController;
use Illuminate\Support\Facades\Route;









// change carousel form //

Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel');
Route::get('/carousel/new', [CarouselController::class, 'create'])->name('carousel.create');
Route::get('/carousel/{id}', [CarouselController::class, 'edit'])->name('carousel.edit');
Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
Route::put('/carousel/{id}', [CarouselController::class, 'update'])->name('carousel.update');
Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.delete');

// change Banner form //

Route::get('/banner', [BannerController::class, 'index'])->name('banner');
Route::get('/banner/new', [BannerController::class, 'create'])->name('banner.create');
Route::get('/banner/edit', [BannerController::class, 'edit'])->name('banner.edit');
Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
Route::put('/banner', [BannerController::class, 'update'])->name('banner.update');
Route::delete('/banner', [BannerController::class, 'destroy'])->name('banner.delete');

// change Cards form //

Route::get('/cards', [CardsController::class, 'index'])->name('cards');
Route::get('/cards/new', [CardsController::class, 'create'])->name('cards.create');
Route::get('/cards/{id}', [CardsController::class, 'edit'])->name('cards.edit');
Route::post('/cards', [CardsController::class, 'store'])->name('cards.store');
Route::put('/cards/{id}', [CardsController::class, 'update'])->name('cards.update');
Route::delete('/cards/{id}', [CardsController::class, 'destroy'])->name('cards.delete');

// change Footer form //

Route::get('/footer', [FooterController::class, 'index'])->name('footer');
Route::get('/footer/new', [FooterController::class, 'create'])->name('footer.create');
Route::get('/footer/{id}', [FooterController::class, 'edit'])->name('footer.edit');
Route::post('/footer', [FooterController::class, 'store'])->name('footer.store');
Route::put('/footer/{id}', [FooterController::class, 'update'])->name('footer.update');
Route::delete('/footer/{id}', [FooterController::class, 'destroy'])->name('footer.delete');

// change LoginBar form //

Route::get('/loginbar', [LoginbarController::class, 'index'])->name('loginbar');
Route::get('/loginbar/new', [LoginbarController::class, 'create'])->name('loginbar.create');
Route::get('/loginbar/{id}', [LoginbarController::class, 'edit'])->name('loginbar.edit');
Route::post('/loginbar', [LoginbarController::class, 'store'])->name('loginbar.store');
Route::put('/loginbar/{id}', [LoginbarController::class, 'update'])->name('loginbar.update');
Route::delete('/loginbar/{id}', [LoginbarController::class, 'destroy'])->name('loginbar.delete');

// change navBar form //

Route::get('/navbar', [NavbarController::class, 'index'])->name('navbar');
Route::get('/navbar/new', [NavbarController::class, 'create'])->name('navbar.create');
Route::get('/navbar/{id}', [NavbarController::class, 'edit'])->name('navbar.edit');
Route::post('/navbar', [NavbarController::class, 'store'])->name('navbar.store');
Route::put('/navbar/{id}', [NavbarController::class, 'update'])->name('navbar.update');
Route::delete('/navbar/{id}', [NavbarController::class, 'destroy'])->name('navbar.delete');
