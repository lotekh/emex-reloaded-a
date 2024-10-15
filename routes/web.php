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
use App\Http\Controllers\CookieController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ConsumController;
use App\Http\Controllers\BlogArticleController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\AuthenticatedOnly;
use Illuminate\Support\Facades\Response;

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware([AuthenticatedOnly::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/contul-meu', [UserController::class, 'edit'])->name('user.edit');
});

Route::post('forgot-password', [UserController::class, 'forgotPassword'])->name('password.email');




Route::view('/test-form', 'test-form');
Route::post('/side-contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/thank-you', 'thank-you')->name('thank-you');

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

Route::get('/autentificare', function () {
    return view('autentificare');
})->name('autentificare');


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
Route::get('/aplicari-vopsele-pardoseli', function () {
    return view('aplicare.aplicari-vopsele-pardoseli');
});
Route::get('/aplicare-pardoseli-epoxidice', function () {
    return view('aplicare.aplicare-pardoseli-epoxidice');
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
Route::get('/produse', [ProductsController::class, 'index'])->name('products.index');


// Routes for orders
Route::get('/produse-adaugate', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/adauga-produs', [OrdersController::class, 'addProduct'])->name('orders.addProduct');
Route::post('/actualizeaza-cantitatea', [OrdersController::class, 'updateQuantity'])->name('orders.updateQuantity');
Route::post('/sterge-produs', [OrdersController::class, 'removeProduct'])->name('orders.removeProduct');
Route::post('/goleste-cosul', [OrdersController::class, 'emptyCart'])->name('orders.empty');
Route::get('/invoice/{orderId}', [OrdersController::class, 'showInvoicePage'])->name('invoice.page');

// Routes for checkout
Route::get('/finalizeaza-comanda', [OrdersController::class, 'showCheckoutForm'])->name('checkout.form');
Route::get('/sumar-comanda/{guid}', [OrdersController::class, 'showSummary'])->name('order.summary');
Route::post('/save-order', [OrdersController::class, 'processCheckout'])->name('checkout.process');
// Ruta pentru obținerea prețului de transport pe baza ID-ului județului
Route::get('/get-transport-price', [OrdersController::class, 'getTransportPrice'])->name('get.transport.price');

Route::get('/secure-payment', [PaymentController::class, 'securePayment'])->name('secure-payment');




// Blog
Route::get('/blog', [BlogArticleController::class, 'index'])->name('blog.index');
Route::get('/blog/article/{id}', [BlogArticleController::class, 'show'])->name('blog.article.show');
Route::get('/search', [BlogArticleController::class, 'search'])->name('blog.search');


// Cine suntem
Route::get('/despre-noi', function () {
    return view('cine_suntem.despre-noi');
})->name('despre_noi');
Route::get('/politica-de-calitate', function () {
    return view('cine_suntem.politica-de-calitate');
})->name('politica_de_calitate');
Route::get('/politica-de-mediu', function () {
    return view('cine_suntem.politica-de-mediu');
})->name('politica_de_mediu');
Route::get('/politica-sanatate-securitate', function () {
    return view('cine_suntem.politica-sanatate-securitate');
})->name('politica_sanatate_securitate');
Route::get('/certificari-iso', function () {
    return view('cine_suntem.certificari-iso');
})->name('certificari-iso');


// Blades for footer
Route::get('/politica-de-retur', function () {
    return view('footer.politica-de-retur');
})->name('politica.retur');
Route::get('/faq', function () {
    return view('footer.faq');
})->name('intrebari.frecvente');
Route::get('/termeni-si-conditii', function () {
    return view('footer.termeni-si-conditii');
})->name('termeni_si_conditii');
Route::get('/confidentialitate-gdpr', function () {
    return view('footer.confidentialitate-gdpr');
})->name('confidentialitate_gdpr');
Route::get('/sitemap.htm', function () {
    return view('footer.sitemap');
})->name('sitemap');
Route::get('/sitemap.html', function () {
    return view('footer.sitemap2');
})->name('sitemap2');
Route::get('/sitemap.ror', function () {
    $path = public_path('resources/other-resources/sitemap.ror'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap.rss', function () {
    $path = public_path('resources/other-resources/sitemap.rss'); 
    return Response::file($path, [
        'Content-Type' => 'application/rss+xml'
    ]);
});
Route::get('/sitemap.txt', function () {
    $path = public_path('resources/other-resources/sitemap.txt'); 
    return Response::file($path, [
        'Content-Type' => 'text/plain'
    ]);
});
Route::get('/sitemap.xml', function () {
    $path = public_path('resources/other-resources/sitemap.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap-base.xml', function () {
    $path = public_path('resources/other-resources/sitemap-base.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/Web.sitemap', function () {
    $path = public_path('resources/other-resources/Web.sitemap.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/urllist.txt', function () {
    $path = public_path('resources/other-resources/urllist.txt'); 
    return Response::file($path, [
        'Content-Type' => 'text/plain'
    ]);
});
Route::get('/sitemap-video.xml', function () {
    $path = public_path('resources/other-resources/sitemap-video.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap-news.xml', function () {
    $path = public_path('resources/other-resources/sitemap-news.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap-code.xml', function () {
    $path = public_path('resources/other-resources/sitemap-code.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap-image.xml', function () {
    $path = public_path('resources/other-resources/sitemap-image.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::get('/sitemap-mobile.xml', function () {
    $path = public_path('resources/other-resources/sitemap-mobile.xml'); 
    return Response::file($path, [
        'Content-Type' => 'application/xml'
    ]);
});


Route::get('/doc/ISO-9001.pdf', function () {
    $path = public_path('docs/ISO-9001.pdf'); 
    return Response::file($path, [
        'Content-Type' => 'application/pdf'
    ]);
});
Route::get('/doc/ISO-18001.pdf', function () {
    $path = public_path('docs/ISO-18001.pdf'); 
    return Response::file($path, [
        'Content-Type' => 'application/pdf'
    ]);
});
Route::get('/doc/ISO-14001.pdf', function () {
    $path = public_path('docs/ISO-14001.pdf'); 
    return Response::file($path, [
        'Content-Type' => 'application/pdf'
    ]);
});


Route::get('/cookies', function () {
    return view('others.cookies');
})->name('cookies');


Route::post('/accept-cookies', [CookieController::class, 'acceptCookies'])->name('accept.cookies');



// Routes for slugs
Route::get('/{slug}', [HomeController::class, 'handleSlug'])->name('slug.handle');

// Consum
Route::get('/consum/{category}', [ConsumController::class, 'index'])->name('consum.index');
Route::get('/{consumption_slug}', [ConsumController::class, 'show'])->name('consum.show');
Route::post('/consum/store', [ConsumController::class, 'store'])->name('consum.store');


