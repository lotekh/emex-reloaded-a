<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

// Route::get('/', function () {
//     return view('header');
// });

Route::get('/footer', function () {
    return view('footer');
});

Route::get('/vopsele-lavabile-2', function () {
    return view('categories.vopsele-lavabile2');
});

Route::get('/', function () {
    return view('homepage');
});
