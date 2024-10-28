<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProductVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ProductVariation::truncate();
        Schema::enableForeignKeyConstraints();

        $csvFile = resource_path('csv/preturi_culori.csv');
        $fileHandle = fopen($csvFile, 'r');

        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if($rowKey) {
                $product = Product::where('slug', $csvRow[0])->first();
                $quantityAndMeasurementUnit = explode(' ', $csvRow[1]);
                $measurementUnit = MeasurementUnit::where('name', $quantityAndMeasurementUnit[1])->first();

                $weight = $csvRow[10] ? $csvRow[10] : 0;

                if($product && $measurementUnit) {
                    ProductVariation::create([
                        'product_id' => $product->id,
                        'measurement_unit_id' => $measurementUnit->id,
                        'quantity' => $quantityAndMeasurementUnit[0],
                        'colour' => $csvRow[2],
                        'price' => $csvRow[5],
                        'name' => $csvRow[6],
                        'addon_text' => $csvRow[7],
                        'ean' => $csvRow[8],
                        'sku' => $csvRow[9],
                        'weight' => $weight,
                    ]);
                }
                else {
                    print_r('Product or measurement unit not found for row ' . $rowKey . PHP_EOL);
                }
                
            }

            $rowKey++;
        }
        fclose($fileHandle);
    }
}
