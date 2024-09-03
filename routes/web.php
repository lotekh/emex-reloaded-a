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
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ConsumController;

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

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

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

// Palete
Route::get('/cartela-culori-ral-vopsele', [PaleteController::class, 'ral'])->name('palete.ral');
Route::get('/cartela-culori-lavabile', [PaleteController::class, 'showLavabile'])->name('lavabile.colors');


// Routes for aplicare
Route::get('/aplicare-vopsele-lavabile', function () {
    return view('aplicare.aplicare-vopsele-lavabile');
})->name('aplicare.vopsele.lavabile');

Route::get('/aplicare-email', function () {
    return view('aplicare.aplicare-email');
});
Route::get('/aplicare-lacuri-alchidice', function () {
    return view('aplicare.aplicare-lacuri-alchidice');
});
Route::get('/aplicare-tencuiala-decorativa', function () {
    return view('aplicare.aplicare-tencuiala-decorativa');
});
Route::get('/aplicare-vopsele-grunduri-bicomponente', function () {
    return view('aplicare.aplicare-vopsele-grunduri-bicomponente');
});
Route::get('/aplicare-vopsele-pardoseala', function () {
    return view('aplicare.aplicare-vopsele-pardoseala');
});
Route::get('/aplicare-vopsea-marcaj-rutier', function () {
    return view('aplicare.aplicare-vopsea-marcaj-rutier');
});
Route::get('/aplicare-pardoseli-autonivelante-bicomponente', function () {
    return view('aplicare.aplicare-pardoseli-autonivelante-bicomponente');
});
Route::get('/aplicare-membrana-hidroizolanta-poliuretanica', function () {
    return view('aplicare.aplicare-membrana-hidroizolanta-poliuretanica');
});
Route::get('/aplicare-vopsele-hidrosolubile', function () {
    return view('aplicare.aplicare-vopsele-hidrosolubile');
});


// Routes for servicii
Route::get('/aplicare-covor-epoxidic-stb', function () {
    return view('servicii.aplicare-covor-epoxidic-stb');
});

Route::get('/aplicare-pardoseala-epoxidica-autonivelanta', function () {
    return view('servicii.aplicare-pardoseala-epoxidica-autonivelanta');
});

Route::get('/vopsire-epoxidica-pardoseli', function () {
    return view('servicii.vopsire-epoxidica-pardoseli');
});

Route::get('/servicii', function () {
    return view('servicii.servicii');
});


// Routes for produse
Route::post('/add-to-wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('products.wishlist');
Route::post('/remove-from-wishlist', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/removee-from-wishlist', [WishlistController::class, 'remove'])->name('wishlist.removee');

Route::post('/get-variation', [ProductsController::class, 'getVariation'])->name('product.getVariation');

use App\Http\Controllers\OrdersController;

// Ruta pentru afișarea coșului de cumpărături
Route::get('/produse-adaugate', [OrdersController::class, 'index'])->name('orders.index');

// Ruta pentru adăugarea unui produs în coș
Route::get('/adauga-produs', [OrdersController::class, 'addProduct'])->name('orders.addProduct');

// Ruta pentru ștergerea unui produs din coș
Route::post('/sterge-produs', [OrdersController::class, 'removeProduct'])->name('orders.removeProduct');

// Ruta pentru golirea coșului
Route::post('/goleste-cosul', [OrdersController::class, 'emptyCart'])->name('orders.empty');

// Ruta pentru finalizarea comenzii
// Route::get('/finalizeaza-comanda', [OrdersController::class, 'checkout'])->name('orders.checkout');


// Checkout
Route::get('/finalizeaza-comanda', [OrdersController::class, 'showCheckoutForm'])->name('checkout.form');
Route::get('/sumar-comanda', [OrdersController::class, 'showSummary'])->name('order.summary');
// Route::post('/finalizeaza-comanda', [OrdersController::class, 'processCheckout'])->name('checkout.process');
Route::post('/save-order', [OrdersController::class, 'processCheckout'])->name('checkout.process');
// Ruta pentru obținerea prețului de transport pe baza ID-ului județului
Route::get('/get-transport-price', [OrdersController::class, 'getTransportPrice'])->name('get.transport.price');

// Consum
Route::get('/consum/{category}', [ConsumController::class, 'index'])->name('consum.index');
Route::get('/{consumption_slug}', [ConsumController::class, 'show'])->name('consum.show');
Route::post('/consum/store', [ConsumController::class, 'store'])->name('consum.store');


// Routes for slugs
Route::get('/{slug}', [HomeController::class, 'handleSlug'])->name('slug.handle');





