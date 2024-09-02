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
        // Găsește produsul după consumption_slug
        $product = Product::where('consumption_slug', $consumption_slug)
            ->with('categories', 'featuredImage', 'variations', 'reviews')
            ->firstOrFail();
        
        // Obține categoria principală a produsului (dacă există)
        $category = $product->categories->first();

        // Pregătește alte date necesare pentru pagina de consum
        $consumData = $this->getConsumDataForProduct($product);

        // Verifică dacă currentPage este setat în sesiune; dacă nu, inițializează-l cu 0
        $currentPage = session('currentPage', 0);

        // Verifică dacă există datele necesare în sesiune sau cerere pentru a calcula consumul
        $result = null;
        if ($currentPage === 3 && session()->has('consum_calculation_data')) {
            // Accesează datele pentru calcul din sesiune
            $calculationData = session('consum_calculation_data');

            // Calculează rezultatul folosind funcția calculateConsumption și datele preluate
            $result = $this->calculateConsumption($calculationData);
        }

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
        // Preia toate datele din cerere
        $data = $request->all();

        // Stochează datele relevante în sesiune pentru a fi utilizate ulterior
        session(['currentPage' => 3, 'consum_calculation_data' => $data]);

        // Redirecționează la aceeași pagină pentru a afișa rezultatele
        return redirect()->route('consum.show', ['consumption_slug' => $request->input('consumption_slug')]);
    }


    public function calculateConsumption($data)
    {
        // Prelucrează datele și execută scriptul corespunzător
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        $consum_data = $this->getConsumDataForProduct($product);

        $script_name = $product->consumption_slug . '.php';
        $script_path = app_path('Http/Controllers/consumuri_scripts/' . $script_name);

        if (file_exists($script_path)) {
            // Bufferizarea output-ului pentru a captura rezultatul
            ob_start();

            // Include fișierul de script și execută-l
            include $script_path;

            // Capturează și returnează output-ul HTML generat de script
            $html_result = ob_get_clean();
            return $html_result;
        } else {
            return '<p>Nu există un script disponibil pentru calculul acestui produs.</p>';
        }
    }


    private function getConsumDataForProduct($product)
    {
        // Obține datele de consum pentru produs
        $consumData = [
            'suprafata_type_name' => 'Tip Suprafață',
            'suprafata_name' => 'Suprafață',
            'suprafata_types' => ['Rigips', 'Tencuiala driscuita', 'Zidarie'], // Exemplu de date
        ];

        return $consumData;
    }
}
