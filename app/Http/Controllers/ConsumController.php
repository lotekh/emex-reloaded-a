<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ConsumController extends Controller
{
    public function index($categorySlug)
    {
        // Găsește categoria după slug
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        // Obține primul produs din acea categorie, folosind relația definită
        $firstProduct = $category->products()->orderBy('order', 'asc')->first(); // Asigură-te că ai o coloană 'order' pentru sortare, altfel schimbă criteriul de sortare

        if ($firstProduct) {
            // Redirecționează către pagina de consum a primului produs
            return redirect()->route('consum.show', ['slug' => $firstProduct->slug]);
        }

        // Dacă nu există produse în acea categorie, arată un mesaj sau redirecționează
        return redirect()->back()->with('error', 'Nu există produse în această categorie.');
    }

    public function show($slug)
    {
        // Găsește produsul după slug
        $product = Product::where('slug', $slug)->with('categories', 'featuredImage', 'variations', 'reviews')->firstOrFail();

        // Obține categoria principală a produsului (dacă există)
        $category = $product->categories->first();

        // Pregătește alte date necesare pentru pagina de consum
        $consumData = $this->getConsumDataForProduct($product);

        // Returnează vizualizarea pentru consum cu datele necesare
        return view('consum.view', [
            'product' => $product,
            'category' => $category,
            'consumData' => $consumData,
        ]);
    }

    private function getConsumDataForProduct($product)
    {
        // Obține datele de consum pentru produs
        $consumData = [
            'suprafata_type_name' => 'Tip Suprafață',
            'suprafata_name' => 'Suprafață',
            'suprafata_types' => ['Rigips', 'Tencuiala', 'Zidărie'], // Exemplu de date
        ];

        return $consumData;
    }
}
