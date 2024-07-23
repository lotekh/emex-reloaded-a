<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/vopsele-lavabile-2', [ProductsController::class, 'index'])->name('vopsele-lavabile-22');


Route::get('/{categorySlug}', [CategoryController::class, 'showCategory'])->name('category.show');

Route::view('/test-form', 'test-form');
Route::post('/side-contact', [ContactController::class, 'store'])->name('side-contact.store');

Route::view('/thank-you', 'thank-you')->name('thank-you');


