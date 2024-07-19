<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('header');
// });

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/vopsele-lavabile-2', function () {
    return view('categories.vopsele-lavabile2');
});

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
