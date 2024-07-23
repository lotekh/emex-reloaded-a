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

Route::view('/test-form', 'test-form');
Route::post('/side-contact', [ContactController::class, 'store'])->name('side-contact.store');
Route::view('/thank-you', 'thank-you')->name('thank-you');

// Ruta wildcard verificată prin controller
Route::get('/{slug}', [CategoryController::class, 'handleSlug'])->name('handleSlug');


