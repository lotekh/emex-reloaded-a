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

        // Dacă slug-ul nu aparține niciunei categorii sau produs, returnează un 404
        abort(404);
    }
}
