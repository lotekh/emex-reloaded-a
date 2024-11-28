<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function handleSlug($slug, Request $request)
    {
        // Verifiy if the slug is for category page
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $request->merge(['is_category_page' => true]);
            return app(CategoryController::class)->showCategory($slug, $request);
        }

        // Verifiy if the slug is for product page
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $request->merge(['is_product_page' => true]);
            return app(ProductsController::class)->showProduct($slug, $request);
        }

        // Verifiy if the slug is for consum page
        $consumptionSlugproduct = Product::where('consumption_slug', $slug)->first();
        if ($consumptionSlugproduct) {
            $request->merge(['is_consum_page' => true]);
            return app(ConsumController::class)->show($slug, $request);
        }

        abort(404);
    }
}
