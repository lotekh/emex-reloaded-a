<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Logica pentru afișarea paginii de start
        return view('homepage');
    }

    public function handleSlug($slug, Request $request)
    {
        // Verifică dacă slug-ul aparține unei categorii
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            return app(CategoryController::class)->showCategory($slug, $request);
        }

        // Verifică dacă slug-ul aparține unui produs
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            return app(ProductsController::class)->showProduct($slug, $request);
        }

        // Verifică dacă slug-ul aparține unui consum
        $consumptionSlugproduct = Product::where('consumption_slug', $slug)->first();
        if ($consumptionSlugproduct) {
            return app(ConsumController::class)->show($slug, $request);
            // return app(ConsumController::class)->show($slug);
        }

        // Dacă slug-ul nu aparține niciunei categorii, produs sau consum, returnează un 404 sau o altă pagină
        abort(404);
    }
}
