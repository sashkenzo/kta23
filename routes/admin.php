<?php
use App\Http\Controllers\Change\Banner2CarouselController;
use App\Http\Controllers\Change\CardsController;
use App\Http\Controllers\Change\FooterController;
use App\Http\Controllers\Change\FooterLogoController;
use App\Http\Controllers\Change\FooterNavigationController;
use App\Http\Controllers\Change\LoginbarController;
use App\Http\Controllers\Change\BannerController;
use App\Http\Controllers\Change\NavbarController;
use App\Http\Controllers\Change\SubNavBarController;
use App\Http\Controllers\Change\FooterSubNavigationController;
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

Route::get('/navs', [NavbarController::class, 'index'])->name('navs');
Route::get('/navs/new', [NavbarController::class, 'create'])->name('navs.create');
Route::get('/navs/{id}', [NavbarController::class, 'edit'])->name('navs.edit');
Route::post('/navs', [NavbarController::class, 'store'])->name('navs.store');
Route::put('/navs/{id}', [NavbarController::class, 'update'])->name('navs.update');
Route::delete('/navs/{id}', [NavbarController::class, 'destroy'])->name('navs.delete');

// change subNavBar form //

Route::get('/subnavs', [SubNavBarController::class, 'index'])->name('subnavs');
Route::get('/subnavs/new', [SubNavBarController::class, 'create'])->name('subnavs.create');
Route::get('/subnavs/{id}', [SubNavBarController::class, 'edit'])->name('subnavs.edit');
Route::post('/subnavs', [SubNavBarController::class, 'store'])->name('subnavs.store');
Route::put('/subnavs/{id}', [SubNavBarController::class, 'update'])->name('subnavs.update');
Route::delete('/subnavs/{id}', [SubNavBarController::class, 'destroy'])->name('subnavs.delete');

// change FooterLogo form //

Route::get('/footerlogo', [FooterLogoController::class, 'index'])->name('footerlogo');
Route::get('/footerlogo/new', [FooterLogoController::class, 'create'])->name('footerlogo.create');
Route::get('/footerlogo/{id}', [FooterLogoController::class, 'edit'])->name('footerlogo.edit');
Route::post('/footerlogo', [FooterLogoController::class, 'store'])->name('footerlogo.store');
Route::put('/footerlogo/{id}', [FooterLogoController::class, 'update'])->name('footerlogo.update');
Route::delete('/footerlogo/{id}', [FooterLogoController::class, 'destroy'])->name('footerlogo.delete');
