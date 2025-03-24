<?php
use App\Http\Controllers\Change\Banner2CarouselController;
use App\Http\Controllers\Change\CardsController;
use App\Http\Controllers\Change\FooterController;
use App\Http\Controllers\Change\LoginbarController;
use App\Http\Controllers\Change\BannerController;
use App\Http\Controllers\Change\NavbarController;
use App\Http\Controllers\Change\SubNavBarController;

use Illuminate\Support\Facades\Route;









// change carousel form //

Route::get('/bannercarousel', [Banner2CarouselController::class, 'index'])->name('bannercarousel');
Route::get('/bannercarousel/new', [Banner2CarouselController::class, 'create'])->name('bannercarousel.create');
Route::get('/bannercarousel/{id}', [Banner2CarouselController::class, 'edit'])->name('bannercarousel.edit');
Route::post('/bannercarousel', [Banner2CarouselController::class, 'store'])->name('bannercarousel.store');
Route::put('/bannercarousel/{id}', [Banner2CarouselController::class, 'update'])->name('bannercarousel.update');
Route::delete('/bannercarousel/{id}', [Banner2CarouselController::class, 'destroy'])->name('bannercarousel.delete');

// change Banner form //

Route::get('/banner', [BannerController::class, 'index'])->name('banner');
Route::get('/banner/new', [BannerController::class, 'create'])->name('banner.create');
Route::get('/banner/{id}', [BannerController::class, 'edit'])->name('banner.edit');
Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.delete');

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

// change subNavBar form //

Route::get('/subnavbar', [SubNavBarController::class, 'index'])->name('subnavbar');
Route::get('/subnavbar/new', [SubNavBarController::class, 'create'])->name('subnavbar.create');
Route::get('/subnavbar/{id}', [SubNavBarController::class, 'edit'])->name('subnavbar.edit');
Route::post('/subnavbar', [SubNavBarController::class, 'store'])->name('subnavbar.store');
Route::put('/subnavbar/{id}', [SubNavBarController::class, 'update'])->name('subnavbar.update');
Route::delete('/subnavbar/{id}', [SubNavBarController::class, 'destroy'])->name('subnavbar.delete');
