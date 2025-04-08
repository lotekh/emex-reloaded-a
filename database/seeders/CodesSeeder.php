<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = resource_path('csv/gtin_mpn_sku.csv');
        $fileHandle = fopen($csvFile, 'r');

        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if($rowKey) {
                $product = Product::where('slug', $csvRow[0])->first();
                if($product) {
                    $product->update([
                        'sku' => $csvRow[1],
                        'mpn' => $csvRow[2],
                        'ean' => $csvRow[3],
                    ]);
                }
                else {
                    echo 'Product not found for slug: ' . $csvRow[0] . PHP_EOL;
                }
            }
            $rowKey++;
        }
    }
}
