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

        // dd($category);
    
        // Obține primul produs din acea categorie
        $firstProduct = $category->products()->orderBy('order', 'asc')->first(); 

        // dd($firstProduct);

        // dd($firstProduct->consumption_slug);
    
        if ($firstProduct) {
            // Redirecționează către URL-ul consumului folosind `consumption_slug`
            return redirect()->route('consum.show', ['consumption_slug' => $firstProduct->consumption_slug]);
        }
    
        // Dacă nu există produse în acea categorie, arată un mesaj sau redirecționează
        return redirect()->back()->with('error', 'Nu există produse în această categorie.');
    }
    
    public function show($consumption_slug)
    {
        // dd($request->all());

        // Găsește produsul după consumption_slug
        $product = Product::where('consumption_slug', $consumption_slug)
            ->with('categories', 'featuredImage', 'variations', 'reviews')
            ->firstOrFail();
        
        // dd($product);
    
        // Obține categoria principală a produsului (dacă există)
        $category = $product->categories->first();

        $result = null;
    
        // Pregătește alte date necesare pentru pagina de consum
        $consumData = $this->getConsumDataForProduct($product);
    
        // Verifică dacă currentPage este setat în sesiune; dacă nu, inițializează-l cu 0
        $currentPage = session('currentPage', 0);

        // dd($product, $category, $result, $consumData, $currentPage);
    
        // Resetăm currentPage la 0 pentru fiecare nouă vizită la această pagină
        session(['currentPage' => 0]);
    
        // Returnează vizualizarea pentru consum cu datele necesare
        return view('consum.view', [
            'product' => $product,
            'category' => $category,
            'consumData' => $consumData,
            'currentPage' => $currentPage, 
            'result' => $result,
        ]);
    }
    
    
    public function store(Request $request)
    {
        // dd($request->all());

        // Setează currentPage la 3 în sesiune
        session(['currentPage' => 3]);

        // Redirecționează la aceeași pagină pentru a afișa rezultatele
        return redirect()->route('consum.show', ['consumption_slug' => $request->input('consumption_slug')]);
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
