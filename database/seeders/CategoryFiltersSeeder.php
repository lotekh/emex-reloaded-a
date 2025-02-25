<?php

namespace Database\Seeders;

use App\Models\CategoryFilter;
use App\Models\CategoryFilterProduct;
use App\Models\Product;
use App\Models\ProductCategoryFilter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategoryFiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CategoryFilterProduct::truncate();
        CategoryFilter::truncate();
        Schema::enableForeignKeyConstraints();

        $files = [
            'tip_liant.csv' => 'Tip liant',
            'sistem.csv' => 'Sistem',
            'solventare.csv' => 'Solventare',
            'exploatare.csv' => 'Exploatare',
            'tip.csv' => 'Tip produs',
            'utilizare.csv' => 'Utilizare',
        ];

        echo '<pre>';

        $messages = [];
        $importedCategories = 0;
        $importedSubcategories = 0;
        $importedProducts = 0;
        foreach($files as $fileName => $categoryFilterName) {
            try {
                //find import file for current category
                $csv = resource_path('csv/' . $fileName);
                $handler = fopen($csv, "r");

                $row = 0;

                //check if categoryfilter exists and if not, create it
                $categoryFilter = CategoryFilter::where('name', $categoryFilterName)->first();
                if(!$categoryFilter) {
                    $categoryFilter = new CategoryFilter();
                    $categoryFilter->name = $categoryFilterName;
                    $categoryFilter->save();
                    $importedCategories++;
                }

                while ($data = fgetcsv($handler, null, ',')) {
                    if ($row > 0) {
                        $filter = [];
                        if($data[0]) {
                            $currentSubfilterName = $data[0];

                            //check if subcategoryfilter exists and if not, create it
                            $subcategoryFilter = CategoryFilter::where(['name' => $currentSubfilterName])->first();
                            if(!$subcategoryFilter) {
                                $subcategoryFilter = new CategoryFilter();
                                $subcategoryFilter->name = $currentSubfilterName;
                                $subcategoryFilter->category_filter_id = $categoryFilter->id;
                                $subcategoryFilter->save();
                                $importedSubcategories++;
                            }
                        }

                        $slugText = $data[2];
                        if($slugText) {
                            $product = Product::where(['slug' => $slugText])->first();
                            if($product) {
                                $productSubcategoryFilter = CategoryFilterProduct::where(['product_id' => $product->id, 'category_filter_id' => $subcategoryFilter->id])->first();

                                if(!$productSubcategoryFilter) {
                                    $productSubcategoryFilter = new CategoryFilterProduct();
                                    $productSubcategoryFilter->product_id = $product->id;
                                    $productSubcategoryFilter->category_filter_id = $subcategoryFilter->id;
                                    $productSubcategoryFilter->save();
                                    $importedProducts++;
                                }
                              
                            }
                            else {
                                $messages[] = 'Produsul cu slugul ' . $slugText . ' nu a fost gasit.';
                            }
                        }
                    }
                    $row++;
                }
                // var_dump($filters);
            }
            catch(\Exception $e) {
                $messages[] = $e->getMessage();
                $messages[] =  'Fisierul ' . $fileName . ' nu a fost gasit sau nu are structura corecta.';
            }
        }

        $messages[] = 'Au fost importate ' . $importedCategories . ' categorii.';
        $messages[] = 'Au fost importate ' . $importedSubcategories . ' subcategorii.';
        $messages[] = 'Au fost atasate subcategorii produselor de ' . $importedProducts . ' ori.';

        var_dump($messages);

        return 0;
    }
}
