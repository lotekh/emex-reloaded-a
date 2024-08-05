<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\PaleteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/footer', function () {
//     return view('footer');
// });

Route::view('/test-form', 'test-form');
Route::post('/side-contact', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/contact', [ContactPageController::class, 'show'])->name('contact.show');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/thank-you', 'thank-you')->name('thank-you');

Route::get('/autentificare', function () {
    return view('autentificare');
})->name('autentificare');

Route::get('/contul-meu', [UserController::class, 'edit'])->name('user.edit');
Route::post('/save-detalii-cont', [UserController::class, 'saveDetaliiCont']);
Route::post('/save-facturare', [UserController::class, 'saveFacturare']);
Route::post('/save-livrare', [UserController::class, 'saveLivrare']);
Route::post('/save-schimba-parola', [UserController::class, 'saveSchimbaParola']);
Route::get('/counties-by-country/{country}', [UserController::class, 'getCountiesByCountry']);

Route::get('/get-counties-by-country/{country_id}', [CountyController::class, 'getCountiesByCountry']);


Route::get('/angajari', function () {
    return view('angajari');
});

Route::get('/solicita-cotatie', function () {
    return view('solicita-cotatie');
});

Route::get('/cartela-culori-ral-vopsele', [PaleteController::class, 'ral'])->name('palete.ral');

use App\Http\Controllers\NewsletterController;

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/aplicare-vopsele-lavabile', function () {
    return view('aplicare.aplicare-vopsele-lavabile');
});



// Rute pentru slug-uri
Route::get('/{slug}', [HomeController::class, 'handleSlug'])->name('slug.handle');

Route::post('/get-variation', [ProductsController::class, 'getVariation'])->name('product.getVariation');



