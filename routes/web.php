<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;


Route::get('/footer', function () {
    return view('footer');
});

// Route::get('/vopsele-lavabile-2', function () {
//     return view('categories.vopsele-lavabile2');
// });

Route::get('/vopsele-lavabile-2', [ProductsController::class, 'index'])->name('vopsele-lavabile-22');


// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
