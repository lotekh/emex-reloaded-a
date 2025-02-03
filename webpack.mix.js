let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

//layout
mix.styles([
        'resources/css/layout.css',
    ], 'public/css/bundled/layout.css').minify('public/css/bundled/layout.css');

//angajari
mix.styles([
        'resources/css/layout.css',
        'resources/css/angajari.css',
    ], 'public/css/bundled/angajari.css').minify('public/css/bundled/angajari.css');

//homepage
mix.styles([
        'resources/css/layout.css',
        'resources/css/homepage.css',
], 'public/css/bundled/homepage.css').minify('public/css/bundled/homepage.css');

//solicita-cotatie
mix.styles([
        'resources/css/layout.css',
        'resources/css/solicita-cotatie.css',
], 'public/css/bundled/solicita-cotatie.css').minify('public/css/bundled/solicita-cotatie.css');

//aplicare
mix.styles([
        'resources/css/layout.css',
        'resources/css/aplicare.css',
], 'public/css/bundled/aplicare.css').minify('public/css/bundled/aplicare.css');

//aplicare extended
mix.styles([
        'resources/css/layout.css',
        'resources/css/produs.css',
        'resources/css/product-card.css',
        'resources/css/product-page.css',
        'resources/css/tabs.css',
        'resources/css/lightbox.css',
        'resources/css/pagination.css',
        'resources/css/aplicare.css',
], 'public/css/bundled/aplicare-extended.css').minify('public/css/bundled/aplicare-extended.css');

//blog
mix.styles([
        'resources/css/layout.css',
        'resources/css/blog.css',
        'resources/css/pagination.css',
], 'public/css/bundled/blog.css').minify('public/css/bundled/blog.css');

//category 
mix.styles([
        'resources/css/layout.css',
        'resources/css/produs.css',
        'resources/css/product-card.css',
        'resources/css/pagination.css',
], 'public/css/bundled/category.css').minify('public/css/bundled/category.css');

//certificari
mix.styles([
        'resources/css/layout.css',
        'resources/css/certificari.css',
], 'public/css/bundled/certificari.css').minify('public/css/bundled/certificari.css');

//despre
mix.styles([
        'resources/css/layout.css',
        'resources/css/despre.css',
], 'public/css/bundled/despre.css').minify('public/css/bundled/despre.css');

//politica-de-calitate
mix.styles([
        'resources/css/layout.css',
        'resources/css/politica-de-calitate.css',
], 'public/css/bundled/politica-de-calitate.css').minify('public/css/bundled/politica-de-calitate.css');

//politica-de-mediu
mix.styles([
        'resources/css/layout.css',
        'resources/css/politica-de-mediu.css',
], 'public/css/bundled/politica-de-mediu.css').minify('public/css/bundled/politica-de-mediu.css');

//politica-de-securitate
mix.styles([
        'resources/css/layout.css',
        'resources/css/politica-de-securitate.css',
        'resources/css/tabs.css',
], 'public/css/bundled/politica-de-securitate.css').minify('public/css/bundled/politica-de-securitate.css');

//consum
mix.styles([
        'resources/css/layout.css',
        'resources/css/consum.css',
        'resources/css/produs.css',
], 'public/css/bundled/consum.css').minify('public/css/bundled/consum.css');

//tabs
mix.styles([
        'resources/css/layout.css',
        'resources/css/tabs.css',
], 'public/css/bundled/tabs.css').minify('public/css/bundled/tabs.css');

//retur
mix.styles([
        'resources/css/layout.css',
        'resources/css/retur.css',
], 'public/css/bundled/retur.css').minify('public/css/bundled/retur.css');

//culori
mix.styles([
        'resources/css/layout.css',
        'resources/css/culori.css',
        'resources/css/cartela-lavabile-culori.css',
], 'public/css/bundled/culori.css').minify('public/css/bundled/culori.css');

//order
mix.styles([
        'resources/css/layout.css',
        'resources/css/order.css',
], 'public/css/bundled/order.css').minify('public/css/bundled/order.css');

//product-card
mix.styles([
        'resources/css/layout.css',
        'resources/css/product-card.css',
], 'public/css/bundled/product-card.css').minify('public/css/bundled/product-card.css');

//plata
mix.styles([
        'resources/css/layout.css',
        'resources/css/plata.css',
], 'public/css/bundled/plata.css').minify('public/css/bundled/plata.css');

//summary
mix.styles([
        'resources/css/layout.css',
        'resources/css/produs.css',
        'resources/css/product-card.css',
        'resources/css/product-page.css',
        'resources/css/tabs.css',
], 'public/css/bundled/product.css').minify('public/css/bundled/product.css');

//wishlist
mix.styles([
        'resources/css/layout.css',
        'resources/css/cart.css',
        'resources/css/product-card.css',
], 'public/css/bundled/wishlist.css').minify('public/css/bundled/wishlist.css');

//servicii
mix.styles([
        'resources/css/layout.css',
        'resources/css/servicii.css',
], 'public/css/bundled/servicii.css').minify('public/css/bundled/servicii.css');